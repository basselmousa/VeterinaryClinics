<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Report extends Pivot
{
    //

    protected $table = 'reports';

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);

    }
}
