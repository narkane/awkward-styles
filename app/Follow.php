<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = "tbl_follow";

    protected $primaryKey = "follow_id";

    public $guarded = ['id'];

    public function user(){
        return $this->hasMany('App\User', 'id','user_id');
    }
}
