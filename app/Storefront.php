<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storefront extends Model
{
    protected $table = "tbl_store_front";

    public $guarded = ['id'];

}
