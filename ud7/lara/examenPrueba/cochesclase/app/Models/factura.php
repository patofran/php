<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model{
    protected $factura = ['cliente_id', 'coche_id', 'fecha'];
}
