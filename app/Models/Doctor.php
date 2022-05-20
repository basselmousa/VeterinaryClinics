<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public function certifications()
    {
        return $this->hasMany(Certificate::class);
    }

    public function dates()
    {
        return $this->hasMany(DoctorDate::class, 'doctor_id');
    }

    public function rate()
    {
        return $this->belongsToMany(User::class, 'rates');
    }

}
