<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;


    protected $fillable = [
        'idCli',
        'marca',
        'modelo',
        'matricula',
    ];

    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'id');  //un vehiculo solo es de un cliente
    }

    public function polizas()
    {
        return $this->hasMany(Poliza::class, 'id');  //un vehiculo puede tener muchas polizas
    }
}
