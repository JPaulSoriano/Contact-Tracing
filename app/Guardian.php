<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $fillable = [
        'student_id',
        'lastname',
        'firstname',
        'mi',
        'address',
        'email',
        'contactno',
        'image',
    ];

    public function student(){
        return $this->belongsTo('App\Student');
    }

    public function fetchers(){
        return $this->hasMany('App\Fetcher');
    }

    public function getFullNameAttribute()
    {
        return "{$this->lastname}, {$this->firstname} {$this->mi}";
    }
}
