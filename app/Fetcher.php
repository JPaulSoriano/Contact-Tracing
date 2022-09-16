<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fetcher extends Model
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
        'verification'
    ];

    public function times(){
        return $this->hasMany('App\Time');
    }

    public function student(){
        return $this->belongsTo('App\Student');
    }

    public function getFullNameAttribute()
    {
        return "{$this->lastname}, {$this->firstname} {$this->mi}";
    }
}
