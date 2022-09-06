<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'lastname', 'firstname', 'mi', 'address', 'contactno', 'visitortype_id'
    ];

    public function visitortype(){
        return $this->belongsTo('App\VisitorType');
    }

    public function getFullNameAttribute()
    {
        return "{$this->lastname}, {$this->firstname} {$this->mi}";
    }
}
