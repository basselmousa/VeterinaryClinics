<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function report()
    {
        return $this->belongsToMany(Doctor::class, 'reports', 'animal_id')
            ->withPivot(['prescription', 'recommendation'])->withTimestamps();
    }
}
