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
        'image',
        'father',
        'femail',
        'fcontactno',
        'fimage',
        'mother',
        'memail',
        'mcontactno',
        'mimage'
    ];

    public function grade(){
        return $this->belongsTo('App\Grade');
    }

    public function fetchers(){
        return $this->hasMany('App\Fetcher');
    }
    public function getFullNameAttribute()
    {
        return "{$this->lastname}, {$this->firstname} {$this->mi}";
    }
}
