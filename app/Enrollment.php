<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = ['user_id', 'school_year_id', 'career_id', 'academic_year', 'status', 'amount', 'observations'];

    // What user was registered for this enrollment?
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
