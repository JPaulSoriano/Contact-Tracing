<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'grade_id',
        'lastname',
        'firstname',
        'mi',
        'address',
        'email',
        'contactno',
        'image'
    ];

    public function grade(){
        return $this->belongsTo('App\Grade');
    }

    public function guardians(){
        return $this->hasMany('App\Guardian');
    }

    public function getFullNameAttribute()
    {
        return "{$this->lastname}, {$this->firstname} {$this->mi}";
    }
}
