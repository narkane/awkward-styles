<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collections extends Model
{
    protected $table = "tbl_products";

    public function categories(){
        $this->hasMany('tbl_categories_m', 'category_id', 'categoryId');
    }
}
