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
        return $this->hasMany(DoctorDate::class);
    }

    public function rate()
    {
        return $this->belongsToMany(User::class, 'rates')->withPivot('rate');
    }

    public function appoints()
    {
        return $this->belongsToMany(User::class, 'appointments', 'doctor_id')
            ->withPivot(['date', 'time', 'animal_id', 'status', 'type'])
            ->withTimestamps();
    }

    public function reports()
    {
        return $this->belongsToMany(Animal::class, 'reports', 'doctor_id')
            ->withPivot(['prescription', 'recommendation'])->withTimestamps();
    }


    public function secretary()
    {
        return $this->hasMany(Secretary::class);
    }
}
