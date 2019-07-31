<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProductGenController extends Controller
{

    public function index($pid, $size, $art_id, $media_id){

        $template = DB::table('templates')
                ->where("pid", "=", $pid)
                ->where("size", "=", $size)
                ->first();

        $art = DB::table(DB::raw("tbl_art_work as art"))
                ->select("media.full_url")
                ->leftJoin(DB::raw("tbl_media_library as media"), function($join){
                    $join->on(DB::raw("media.id"), "=", DB::raw("art.mediaid"));
                })
                ->where(DB::raw("art.id"), "=", $art_id)
                ->first();

        $prod = DB::table("tbl_media_library")
                ->select("full_url")
                ->where("id", "=", $media_id)
                ->first();

        // DIE IF ANY ARE EMPTY
        //if($template || $art || $prod){ die("LEAVE ME!"); }

        $art_image = $this->imgMaker($art->full_url);
        $prod_image = $this->imgMaker($prod->full_url);

        imagecopy($prod_image, $art_image, $template->x, $template->y);
        $image = imagejpeg($prod_image,
                $pid . "-" . $art_id . "-" . $size . ".jpg",100);

        imagedestroy($prod_image);
        imagedestroy($art_image);

        header('Content-type: image/jpeg');
        echo $image;

    }

    /**
     * List of images to be processed and returned
     * @param string $img
     * @return mixed
     */
    private function imgMaker($img){
            switch(exif_imagetype($img)){
                case IMAGETYPE_GIF:
                    return imagecreatefromgif($image);
                    break;
                case IMAGETYPE_PNG:
                    return imagecreatefrompng($image);
                    break;
                default:    // JPEG
                    return imagecreatefromjpeg($image);
                    break;
            }
    }

}
