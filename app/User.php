<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'email', 'password',
        'first_name', 'last_name', 'identity_card', 'gender', 'birth_date', 'photo', 'remark',
        'phone', 'cellphone', 'address',
        'role_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'birth_date'
    ];

    // A user have just one role in the system
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    // The first name + the last name.
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // A user have several enrollments
    public function enrollments()
    {
        return $this->hasMany('App\Enrollment');
    }

    public function getPhotoUrlAttribute()
    {
        $no_image = 'imagenes/not-available.png';

        if ($this->photo == '')
            return $no_image;

        switch ($this->role_id) {
            case 2:
                $path_role = 'alumnos';
                break;
            case 3:
                $path_role = 'docentes';
                break;
            default:
                return $no_image;
        }

        return 'imagenes/' . $path_role . '/' . $this->id . '.' . $this->photo;
    }

    public function getBirthDateFormatAttribute()
    {
        if ($this->birth_date)
            return $this->birth_date->toDateString();

        return '';
    }

    public function getIsAdminAttribute()
    {
        return $this->role_id == 1;
    }
}
