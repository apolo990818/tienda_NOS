<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders'; // Asegúrate de que coincida con tu base de datos
    protected $fillable = ['nombre', 'estado']; // Agrega los campos correctos
}



