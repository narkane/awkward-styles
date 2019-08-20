<?php

namespace App\Http\Controllers\API;

use App\ProductInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageMakerController extends Controller
{

    private $templateW = 999;
    private $templateH = 999;

    private $info = null;

    private $templateExists = true;

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
     * @param @mediaId
     * @throws \ImagickException
     */
    public function index(Request $request, $pid, $size, $art_design, $mediaId = null)
    {

        $newWidth = 400;
        $newHeight = 400;
        $imageWidth = 0;
        $imageHeight = 0;
        $groupWidth = 0;
        $groupHeight = 0;
        $topX = 999;
        $topY = 999;
        $bottomX = 0;
        $bottomY = 0;

        $msgX = 0;
        $msgT = 0;

        $design = null;

            // Get design
            try {

                $design_query = \App\ArtistDesigns::where('id', '=', $art_design);

                $design = json_decode($design_query->first()->design_data);//\App\ArtistDesigns::where('id', '=', $art_design)->first()->design_data);

                $template = \App\Templates::where('pid', '=', $pid)
                        ->where('size', '=', $size);

                if($template->exists()){
                    $template = (object)array_filter((array)json_decode($template->first()->values));
                } else {
                    $this->templateExists = false;
                }

                $image = new \Imagick();
                $image->setBackgroundColor(new \ImagickPixel('transparent'));

                if (!is_null($mediaId)) {
                    //if (ProductInformation::verifyMediaToProduct($pid, $mediaId)) {
                        // Locate media by ID
                        $blob = $this->setPath(\App\Media::getUrlById($mediaId));
                    //}
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

                if (($imageWidth / $newWidth) > ($imageHeight / $newHeight)) {
                    $newHeight = $imageHeight / ($imageWidth / $newWidth);
                } else {
                    $newWidth = $imageWidth / ($imageHeight / $newHeight);
                }

                $productImage->adaptiveResizeImage($newWidth, $newHeight, true);

                $clipMask = new \Imagick();
                $clipMask->newImage($newWidth, $newHeight, new \ImagickPixel('transparent'), 'png');

                $clipMask->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
                //$clipMask->setImageArtifact('compose:args', "1,0,-0.5,-.5");

                if($this->templateExists) {
                    foreach ($template as $t) {

                        $topX = ($t->x < $topX) ? $t->x : $topX;
                        $topY = ($t->y < $topY) ? $t->y : $topY;

                        $bottomX = (($t->x + $t->width) > $bottomX) ? ($t->x + $t->width) : $bottomX;
                        $bottomY = (($t->y + $t->height) > $bottomY) ? ($t->y + $t->height) : $bottomY;

                        switch ($t->shape) {
                            default: // Rectangle
                                $clipMask->drawImage(
                                    $this->rectangle($t)
                                );
                                break;

                            case '1':  // Circle
                                $clipMask->drawImage($this->circle(
                                    $t));
                                break;
                        }

                    }
                } else {

                    // Math Time
                    $topX = $productImage->getImageWidth() / 3;
                    $topY = $productImage->getImageHeight() / 3;

                    $bottomX = $topX * 2;
                    $bottomY = $topY * 2;

                    $drawRect = new \ImagickDraw();
                    //$draw->setFillColor(new \ImagickPixel("rgba(255,255,255,0)"));
                    //$draw->color($t->x, $t->y, \Imagick::PAINT_POINT);
                    $drawRect->rectangle($topX, $topY, $bottomX, $bottomY);

                    $clipMask->drawImage($drawRect);
                }

                $groupWidth = $bottomX - $topX;
                $groupHeight = $bottomY - $topY;

                $myImages = new \Imagick();
                $myImages->newImage($newWidth, $newHeight, new \ImagickPixel('transparent'));

                $iLeft = 999;
                $iTop = 999;

                // Go Through Each Object
                foreach ($design->objects as $obj) {

                    if (!isset($obj->src) || $obj->src === null) {
                        continue;
                    }

                    $iLeft = ($obj->left < $iLeft) ? $obj->left : $iLeft;
                    $iTop = ($obj->top < $iTop) ? $obj->top : $iTop;

                    // Get Test Image
                    $designImage = new \Imagick();
                    $designUrl = (substr($obj->src, 0, 4) === "data") ?
                        base64_decode(explode(",", $obj->src)[1]) : file_get_contents($this->setPath($obj->src));
                    $designImage->readImageBlob($designUrl);

                    $artGeo = $designImage->getImageGeometry();

                    $scaleW = $obj->percentW * $groupWidth;
                    $scaleH = $obj->percentH * $groupHeight;

                    $designImage->adaptiveResizeImage($scaleW, $scaleH, true);

                    // HANDLE ANGLES
                    if ($obj->angle > 0) {
                        $designImage->rotateImage(new \ImagickPixel('transparent'), $obj->angle);
                    }

                    //$compositeW = (((($groupWidth * $obj->percentX) + $topX)/2) - ($designImage->getImageWidth() / 2));
                    //$compositeH = (((($groupHeight * $obj->percentY) + $topY)/2) - ($designImage->getImageHeight() / 2));
                    //$compositeW = (($groupWidth * $obj->percentX));
                    //$compositeH = (($groupHeight * $obj->percentY));
                    $compositeW = ($topX + ($groupWidth * $obj->percentX) - ($designImage->getImageWidth()/2));
                    $compositeH = ($topY + ($groupHeight * $obj->percentY) - ($designImage->getImageHeight()/2));

                    $myImages->compositeImage(
                        $designImage, \Imagick::COMPOSITE_DEFAULT,
                        $compositeW,
                        $compositeH);

                    /*
                    $this->info = array(
                        "groupW" => $groupWidth,
                        "groupH" => $groupHeight,
                        "topX" => $topX,
                        "topY" => $topY,
                        "bottomX" => $bottomX,
                        "bottomY" => $bottomY,
                        "obj->W" => $obj->objectWidth,
                        "obj->H" => $obj->objectHeight,
                        "imageW" => $designImage->getImageWidth(),
                        "imageH" => $designImage->getImageHeight(),
                        "scaleW" => $scaleW,
                        "scaleH" => $scaleH,
                        "x" => $compositeW,
                        "Y" =>$compositeH
                    );

                    array_push($this->info, $obj);
                    die(var_dump($this->info));
                    */


                    //$myImages->addImage($designImage);
                }

                $myImages->compositeImage(
                    $clipMask,
                    \Imagick::COMPOSITE_DSTIN,
                    0, 0,
                    //($topX - $iLeft),
                    //($topY - $iTop),
                    \Imagick::CHANNEL_ALL
                );

                $productImage->compositeImage($myImages,
                    \Imagick::COMPOSITE_ATOP,
                    0,
                    0, \Imagick::CHANNEL_ALL);

                $image->addImage($productImage);


            } catch (\Exception $e) {

                // DROP SOME ERROR IMAGE
                /*
                echo "MESSAGE: " . $e->getMessage() . "<br/>";
                echo "CODE: " . $e->getCode() . "<br/>";
                echo "FILE: " . $e->getFile() . "<br/>";
                echo "LINE: " . $e->getLine() . "<br/>";
                die();

                /*
                // Create Error Image
                $draw = new \ImagickDraw();

                $image->newImage(400, 400, new \ImagickPixel('#ffffff'));

                $draw->setFont('Arial');
                $draw->setFontSize(10);

                $image->annotateImage($draw, 20, 50, 0, $e->getMessage());
                */

                $image = new \Imagick();
                $errorImg = file_get_contents(public_path() . "/images/error_image.png");
                $image->readImageBlob($errorImg);
                $image->adaptiveResizeImage(400,400,true);

            }

            $image->setImageFormat('png');

            // FOR ERROR PURPOSES
            if(is_null($this->info)) {
                header('Content-type: image/png');
                echo $image->getImageBlob();
            }
            $image->destroy();
            die();

    }

    /**
     * Sets the path according to local file or HTTP
     * @param $url
     * @return string
     */
    private function setPath($url)
    {

        $return = $url;

        if ((strpos($url, "http:") !== false)) {
            $return = str_replace(" ", "%20", $url);
        } else {
            $return = public_path() . $url;
        }

        return $return;
    }

    /**
     * Create a Basic Rectangle for Imagick. Should only be used for templating.
     * @param $t
     * @param null $designImage
     * @return \ImagickDraw
     */
    private function rectangle($t, $designImage = null)
    {
        $draw = new \ImagickDraw();
        //$draw->setFillColor(new \ImagickPixel("rgba(255,255,255,0)"));
        //$draw->color($t->x, $t->y, \Imagick::PAINT_POINT);
        $draw->rectangle($t->x, $t->y, ($t->x + $t->width), ($t->y + $t->height));

        return $draw;
    }

    /**
     * Create a Basic Circle for Imagick
     * @param $t
     * @param $designImage
     * @return \ImagickDraw
     */
    private function circle($t, $designImage = null)
    {
        $draw = new \ImagickDraw();
        $radius = sqrt(($t->width * $t->width) + ($t->height * $t->height)) / sqrt(2);

        //$draw->setFillColor(new \ImagickPixel("rgba(255,255,255,0)"));
        //$draw->color($t->x, $t->y, \Imagick::PAINT_POINT);

        $draw->circle(($t->x + ($t->width / 2)), ($t->y + ($t->height / 2)),
            ($t->x + ($t->width / 2)) + ($radius / 2), ($t->y + ($t->height / 2)));
        return $draw;
    }

}
