<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $table = 'tbl_art_work';

    public $guarded = ['id'];

    public $timestamps = false;

    public function media() {
        return $this->hasOne('App\Media', 'id', 'mediaid');
    }
}