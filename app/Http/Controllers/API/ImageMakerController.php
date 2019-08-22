<?php

namespace App\Http\Controllers\API;

use App\ProductInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageMakerController extends Controller
{

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
    public function index(Request $request, $pid, $size, $art_design = 0, $mediaId = null)
    {

        $newWidth = 400;
        $newHeight = 400;
        $topX = 999;
        $topY = 999;
        $bottomX = 0;
        $bottomY = 0;

        $design = null;

            // Get design
            try {

                if($art_design != 0) {
                    $design_query = \App\ArtistDesigns::where('id', '=', $art_design);

                    $design = json_decode($design_query->first()->design_data);//\App\ArtistDesigns::where('id', '=', $art_design)->first()->design_data);
                } else {
                    $design = new \stdClass();
                    $design->objects = [];
                }

                $template = \App\Templates::where('pid', '=', $pid)
                        ->where('size', '=', $size);

                if($template->exists()){
                    $template = (object)array_filter((array)json_decode($template->first()->values));
                } else {
                    $this->templateExists = false;
                }

                $image = new \Imagick();
                $image->setBackgroundColor(new \ImagickPixel('transparent'));
                $image->setResolution(300,300);

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
                    $drawRect->rectangle($topX, $topY, $bottomX, $bottomY);

                    $clipMask->drawImage($drawRect);
                }

                $groupWidth = $bottomX - $topX;
                $groupHeight = $bottomY - $topY;

                $myImages = new \Imagick();
                $myImages->newImage($newWidth, $newHeight, new \ImagickPixel('transparent'));
               // $myImages->setResolution(10000,10000);

                $iLeft = 999;
                $iTop = 999;
                // Go Through Each Object
                foreach ($design->objects as $obj) {

                    if ($obj->type === 'awkward-image' && (!isset($obj->src) || $obj->src === null)) {
                        continue;
                    }

                    $iLeft = ($obj->left < $iLeft) ? $obj->left : $iLeft;
                    $iTop = ($obj->top < $iTop) ? $obj->top : $iTop;

                    $designImage = new \Imagick();

                    if($obj->type === 'awkward-image') {
                        //continue;
                        // Get Test Image
                        $designUrl = (substr($obj->src, 0, 4) === "data") ?
                            base64_decode(explode(",", $obj->src)[1]) : file_get_contents($this->setPath($obj->src));
                        $designImage->readImageBlob($designUrl);

                        //$designImage->adaptiveBlurImage(0, 10, \Imagick::ALPHACHANNEL_TRANSPARENT);

                        $designImage->setImageCompressionQuality(100);
                    } else {

                        $designImage->newImage($obj->width * $obj->scaleX, $obj->height * $obj->scaleY, new \ImagickPixel('transparent'));
                        //$designImage->setResolution(10000,10000);
                        $designImage->setImageFormat('png');

                        $draw = new \ImagickDraw();
                        $draw->setGravity(\Imagick::GRAVITY_NORTHEAST);
                        $draw->setFillColor(new \ImagickPixel($obj->fill));

                        $draw->setFont($this->findFont($obj->fontFamily));
                        $draw->setFontSize($obj->fontSize);
                        if($obj->fontWeight !== null || !empty($obj->fontWeight)) {
                            $draw->setFontWeight(800);
                        }

                        if($obj->fontStyle !== "normal"){
                            $draw->setFontStyle(\Imagick::STYLE_ITALIC);
                        }

                        $draw->setTextDecoration(($obj->underline) ? \Imagick::DECORATION_UNDERLINE : \Imagick::DECORATION_NO);

                        $designImage->annotateImage($draw,
                            0, 0, $obj->angle, $obj->text);

                    }

                    $scaleW = $obj->percentW * $groupWidth;
                    $scaleH = $obj->percentH * $groupHeight;

                    $designImage->scaleImage($scaleW, $scaleH, true);
                    //$designImage->adaptiveResizeImage($scaleW, $scaleH, true);

                    // HANDLE ANGLES
                    if ($obj->angle > 0) {
                        $designImage->rotateImage(new \ImagickPixel('transparent'), $obj->angle);
                    }

                    $compositeW = ($topX + ($groupWidth * $obj->percentX) - ($designImage->getImageWidth() / 2));
                    $compositeH = ($topY + ($groupHeight * $obj->percentY) - ($designImage->getImageHeight() / 2));

                    $myImages->compositeImage(
                        $designImage,
                        \Imagick::COMPOSITE_XOR,
                        //\Imagick::COMPOSITE_DEFAULT,
                        $compositeW,
                        $compositeH);

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


                $this->info = "b";

                echo "MESSAGE: " . $e->getMessage() . "<br/>";
                echo "CODE: " . $e->getCode() . "<br/>";
                echo "FILE: " . $e->getFile() . "<br/>";
                echo "LINE: " . $e->getLine() . "<br/>";
                die();
/*

                $image = new \Imagick();
                $errorImg = file_get_contents(public_path() . "/images/error_image.png");
                $image->readImageBlob($errorImg);
                $image->adaptiveResizeImage(400,400,true);
*/
            }

        if(is_null($this->info)) {

            $image->setImageFormat('png');
            header('Content-type: image/png');
            echo $image->getImageBlob();
            $image->destroy();
            die();
        }

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

    /**
     * Creates font file if it doesn't exist, or reads it if it does.
     * @param $fontName
     * @return string
     */
    private function findFont($fontName){
        $tffFile = fullPublicPath(['fonts','google']) . DIRECTORY_SEPARATOR
            . str_replace("'", "", str_replace('"', "",
                str_replace(" ", "_", $fontName))) . '.ttf';

        if(!file_exists($tffFile)){
            $fontUrl = 'http://fonts.googleapis.com/css?family=' . str_replace("'", "", str_replace('"', "",
                    str_replace(" ", "+", $fontName)));
            $fontDescription = file_get_contents($fontUrl);
            $startStr = 'url(';
            $startStrLen = strlen($startStr);
            $start = strpos($fontDescription, $startStr) + $startStrLen;
            $end = strpos($fontDescription, ')', $start);
            $tffUrl = substr($fontDescription, $start, $end - $start);
            file_put_contents($tffFile, file_get_contents($tffUrl));
        }
        return $tffFile;
    }
}
