<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siniestro extends Model
{
    protected $fillable = ['id_polizas', 'fecha', 'comunidad', 'provincia', 'documento'];
}
