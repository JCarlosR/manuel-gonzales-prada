<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = ['user_id', 'school_year_id', 'section_id', 'status', 'amount', 'observations'];

    // What user was registered for this enrollment?
    public function student()
    {
        return $this->belongsTo('App\User');
    }

}
