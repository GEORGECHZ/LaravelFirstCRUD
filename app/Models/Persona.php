<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas';
    use SoftDeletes;

    protected $fillable = ['estatus'];

    public function domicilios()
    {
        return $this->hasMany('App\Models\PersonaDomicilio');
    }
}
