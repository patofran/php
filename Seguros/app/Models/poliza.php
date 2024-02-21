<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poliza extends Model
{
    protected $fillable = ['id_vehiculo', 'importe', 'fecha_caducidad'];
}
