<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siniestro extends Model
{
    use HasFactory;

    protected $filliable = [
        'idPol',
        'comunidad',
        'provincia',
        'documento',
    ];

    public function polizas()
    {
        return $this->belongsTo(Poliza::class, 'id');  //un siniestro solo puede estar en una poliza
    }
}
