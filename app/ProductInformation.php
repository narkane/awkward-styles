<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductInformation extends Model
{

    public $table = "tbl_products";

    public $primaryKey = "id";

    /**
     * Get MEDIA based on Product ID
     * @param $id
     * @return mixed
     */
    public static function mediaById($id){
        return DB::table(DB::raw("tbl_media_library as lib"))
            ->select("lib.full_url as url")
            ->leftJoin(DB::raw("tbl_products as prod"), function($join) {
                $join->on(DB::raw("FIND_IN_SET(lib.id, prod.image)"), ">", DB::raw("0"));
            })
            ->where(DB::raw("prod.id"), "=", DB::raw("'" . $id . "'"))
            ->get();
    }

    /**
     * Verify that a media id matches a product id
     * @param $pid
     * @param $mediaId
     * @return bool
     */
    public static function verifyMediaToProduct($pid, $mediaId){
        $check = self::where('id', '=', $pid)->first();
        if($check){
            $array = (strpos($check->image, ",") != false)  ?
                explode(",", $check->image) :
                [$check->image];

            if(in_array($mediaId, $array)){
                return true;
            }
        }
        return false;
    }

    public function media(){
        $this->hasMany('tbl_media_library', 'id', 'images');
    }

}
