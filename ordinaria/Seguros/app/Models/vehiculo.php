<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    protected $fillable  = ['id_cliente', 'marca', 'modelo', 'matricula'];
}
