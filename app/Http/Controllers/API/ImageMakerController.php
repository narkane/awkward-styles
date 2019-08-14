<?php

namespace App\Http\Controllers\API;

use App\ProductInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageMakerController extends Controller
{

    private $templateW = 999;
    private $templateH = 999;

    /**
     * Reveals a rendered image based on the FabricJS final product
     *
     * Notes: Pass a mediaID if products image should be change due to some type of variant
     * such as Color.
     *
     * @param Request $request
     * @param $pid
     * @param $size
     * @param $art_design
     * @throws \ImagickException
     */
    public function index(Request $request, $pid, $size, $art_design){

        $newWidth = 400;
        $newHeight = 400;
        $imageWidth = 0;
        $imageHeight = 0;
        $topX = 999;
        $topY = 999;
        $bottomX = 0;
        $bottomY = 0;

        // Get design
        $design = \App\ArtistDesigns::where('id', '=', $art_design)->first()->design_data;

        $template = (object) array_filter((array) json_decode(
            \App\Templates::where('pid', '=', $pid)
                ->where('size', '=', $size)->first()->values));

        $image = new \Imagick();
        $image->setBackgroundColor(new \ImagickPixel('transparent'));

        // Pull Shirt Id
        $mediaId = ($request->has('mediaId')) ? $request->query('mediaId') : null;

            try {
                if ($mediaId) {
                    if (ProductInformation::verifyMediaToProduct($pid, $mediaId)) {
                        // Locate media by ID
                        $blob = $this->setPath(\App\Media::getUrlById($mediaId));
                    }
                } else {
                    // Get first IMAGE
                    $blob = $this->setPath(ProductInformation::mediaById($pid)[0]->url);
                }
                $productImage = new \Imagick();
                $imageFile = file_get_contents($blob);
                $productImage->readImageBlob($imageFile);

                $geo = $productImage->getImageGeometry();
                $imageWidth = $geo['width'];
                $imageHeight = $geo['height'];

                if(($imageWidth/$newWidth) > ($imageHeight/$newHeight)) {
                    $newHeight = $imageHeight / ($imageWidth / $newWidth);
                } else {
                    $newWidth = $imageWidth / ($imageHeight / $newHeight);
                }

                $clipMask = new \Imagick();
                $clipMask->newImage($newWidth, $newHeight, new \ImagickPixel('rgba(255,255,255,0)'), 'png');

                // Get Test Image
                $designImage = new \Imagick();
                $designUrl = file_get_contents($this->setPath('/images/design-images/1.jpg'));
                $designImage->readImageBlob($designUrl);

                foreach($template as $t){

                    $topX = ($t->x < $topX) ? $t->x : $topX;
                    $topY = ($t->y < $topY) ? $t->y : $topY;

                    $bottomX = (($t->x + $t->width) > $bottomX) ? ($t->x + $t->width) : $bottomX;
                    $bottomY = (($t->y + $t->height) > $bottomY) ? ($t->y + $t->height) : $bottomY;

                    switch($t->shape){
                        default: // Rectangle
                            $clipMask->drawImage(
                                $this->rectangle($t, $designImage)
                            );
                            break;

                        case '1':  // Circle
                            $clipMask->drawImage($this->circle(
                                $t, $designImage));
                            break;
                    }

                }

                $designImage->resizeImage(($bottomX - $topX), ($bottomY - $topY), \Imagick::FILTER_LANCZOS, 0, true);


                $clipMask->compositeImage($designImage, \Imagick::COMPOSITE_BLEND, $topX, $topY, \Imagick::CHANNEL_ALL);

                //$designImage->compositeImage($clipMask, \Imagick::COMPOSITE_BLEND, 0, 0);

                //$image->newImage($newWidth, $newHeight, "white", "png");

                $productImage->compositeImage($clipMask, \Imagick::COMPOSITE_OVER, 0,0, \Imagick::CHANNEL_ALL);

                $image->addImage($productImage);

                //$image->compositeImage($productImage, \Imagick::COMPOSITE_DEFAULT, 0, 0);

               // $image->addImage($productImage);

            } catch (\Exception $e){

                echo "MESSAGE: " . $e->getMessage() . "<br/>";
                echo "CODE: " . $e->getCode() . "<br/>";
                echo "FILE: " . $e->getFile() . "<br/>";
                echo "LINE: " . $e->getLine() . "<br/>";
                die();

                // Create Error Image
                $draw = new \ImagickDraw();

                $image->newImage(400, 400, new \ImagickPixel('#ffffff'));

                $draw->setFont('Arial');
                $draw->setFontSize(10);

                $image->annotateImage($draw, 20, 50, 0, $e->getMessage());


            }

        $image->setImageFormat('png');
        header('Content-type: image/png');
        echo $image->getImageBlob();
        $image->destroy();
        die();

    }

    /**
     * Sets the path according to local file or HTTP
     * @param $url
     * @return string
     */
    private function setPath($url){
        return (strpos($url, "http:") !== false) ? $url : public_path() . $url;
    }

    /**
     * Create a Basic Rectangle for Imagick. Should only be used for templating.
     * @param $t
     * @param null $designImage
     * @return \ImagickDraw
     */
    private function rectangle($t, $designImage = null){
        $draw = new \ImagickDraw();
        $draw->setFillColor(new \ImagickPixel("rgba(255,255,255,0)"));
        $draw->color($t->x, $t->y, \Imagick::PAINT_POINT);
        $draw->rectangle($t->x, $t->y, ($t->x + $t->width), ($t->y + $t->height));

        return $draw;
    }

    /**
     * Create a Basic Circle for Imagick
     * @param $t
     * @param $designImage
     * @return \ImagickDraw
     */
    private function circle($t, $designImage){
        $draw = new \ImagickDraw();
        $radius = sqrt(($t->width * $t->width) + ($t->height * $t->height)) / sqrt(2);

        $draw->circle(($t->x + ($t->width / 2)), ($t->y + ($t->height / 2)),
            ($t->x + ($t->width / 2)) + ($radius/2), ($t->y + ($t->height / 2)));
        return $draw;
    }

}
