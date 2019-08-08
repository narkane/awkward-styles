<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductInformation extends Model
{

    public $table = "tbl_products";

    public $primaryKey = "id";

    public static function mediaById($id){

        return DB::table(DB::raw("tbl_media_library as lib"))
            ->select("lib.full_url as url")
            ->leftJoin(DB::raw("tbl_products as prod"), function($join) {
                $join->on(DB::raw("FIND_IN_SET(lib.id, prod.image)"), ">", DB::raw("0"));
            })
            ->where(DB::raw("prod.id"), "=", DB::raw("'" . $id . "'"))
            ->get();
    }

    public function media(){
        $this->hasMany('tbl_media_library', 'id', 'images');
    }

}
