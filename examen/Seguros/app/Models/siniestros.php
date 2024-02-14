<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poliza extends Model{
    protected $poliza = ['id_poliza','fecha', 'comunidad', 'provincia', 'documento'];
}