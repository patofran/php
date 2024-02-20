<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliza extends Model
{
    use HasFactory;

    protected $fillable = [
        'idVehi',
        'importe',
        'fecha_cad',

    ];

    public function vehiculos()
    {
        return $this->belongsTo(Vehiculo::class, 'id');  //una poliza solo es de un vehiculo
    }

    public function siniestros()
    {
        return $this->hasMany(Siniestro::class, 'id');  //una poliza puede tener muchos siniestros
    }
}
