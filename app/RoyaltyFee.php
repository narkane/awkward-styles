<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoyaltyFee extends Model
{
    public $table = "tbl_royalty_fee";

    public $guarded = ['id'];
}
