<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'Clientes';
    protected $fillable = [
        'nombre', 'documento', 'email', 'direccion'
    ];
}
