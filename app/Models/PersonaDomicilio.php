<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaDomicilio extends Model
{
    use HasFactory;
    protected $table = 'personas_domicilios';

    public function persona()
    {
        return $this->belongsTo('App\Models\Persona');
    }

}
