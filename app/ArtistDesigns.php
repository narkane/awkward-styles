<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistDesigns extends Model
{
    public $table = "tbl_art_designs";

    public $fillable = [
        'id', 'artist_id', 'product_id', 'storefront_id', 'is_public', 'design_data'
    ];

    /**
     * Create or Update Artwork Designs
     *
     * @param $design_data
     * @param $product_id
     * @param $artist_id
     * @param null $storefront_id
     * @param bool $is_public
     * @param null $id
     * @return bool
     */
    public static function createDesign($design_data, $product_id, $artist_id, $storefront_id = null, $is_public = true, $id = null){

        if($id){
            // UPDATE
            $save = self::updateOrCreate([
                'id' => $id, 'artist_id' => $artist_id],[
                    'design_data' => $design_data,
                    'product_id' => $product_id,
                    'storefront_id' => $storefront_id,
                    'is_public' => $is_public
            ]);
        } else {
            $save = self::create([
                'artist_id' => $artist_id,
                'design_data' => $design_data,
                'product_id' => $product_id,
                'storefront_id' => $storefront_id,
                'is_public' => $is_public
            ]);
        }

        return ($save) ? $save->id : false;

    }
}
