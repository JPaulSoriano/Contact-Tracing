<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitorType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function visits(){
        return $this->hasMany('App\Visit');
    }
}
