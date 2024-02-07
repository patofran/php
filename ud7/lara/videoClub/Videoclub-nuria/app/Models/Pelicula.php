<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $Pelicula = ['title', 'year', 'director', 'poster', 'rented', 'synopsis'];
}
