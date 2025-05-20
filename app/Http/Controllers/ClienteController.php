<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo_documento' => 'required|string',
            'numero_documento' => 'required|string',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|email',
            'telefono' => 'required|string',
        ]);

        $cliente = Cliente::where('numero_documento', $validated['numero_documento'])->first();

        if ($cliente) {
            return response()->json([
                'message' => 'Cliente ya existe',
                'cliente' => $cliente,
                'guest_id' => $cliente->id,  // Enviamos el id del cliente aquí
            ], 200);
        }

        $cliente = Cliente::create($validated);

        return response()->json([
            'message' => 'Cliente creado con éxito',
            'cliente' => $cliente,
            'guest_id' => $cliente->id,  // Enviamos el id del cliente aquí
        ], 201);
    }
}
