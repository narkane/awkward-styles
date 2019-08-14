<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public $table = "tbl_media_library";

    /**
     * Get the Media URL by ID
     * @param $id
     * @return |null
     */
    public static function getUrlById($id){
        $media = self::where('id', '=', $id)->first();
        return ($media) ? $media->full_url : null;
    }
}
