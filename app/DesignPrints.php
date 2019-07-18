<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignPrints extends Model
{

    protected $table = "design_prints";

    protected $fillable = [
        'id', 'library_id', 'x', 'y', 'width', 'height', 'pid', 'size'
    ];

    public function designLibrary(){
        return $this->belongsToMany(
            'App\DesignLibrary',
            'design_library');
    }

}
