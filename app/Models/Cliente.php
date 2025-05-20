<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    // Definir la tabla asociada
    protected $table = 'clientes';

    // Campos asignables masivamente
    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombres',
        'apellidos',
        'correo',
        'telefono',
    ];

    // Usar timestamps (created_at, updated_at)
    public $timestamps = true;

    // Accesorio para obtener nombre completo
    public function getNombreCompletoAttribute()
    {
        return "{$this->nombres} {$this->apellidos}";
    }
}
