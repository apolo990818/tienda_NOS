<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function agregar($id)
    {
        $producto = Producto::findOrFail($id);
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => 1,
                'imagen' => $producto->image ? asset('storage/' . $producto->image) : asset('images/default.png')
            ];
        }

        session()->put('carrito', $carrito);
        return redirect()->route('carrito.ver')->with('success', 'Producto agregado al carrito');
    }

    public function verCarrito()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito.carrito', compact('carrito'));
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.ver')->with('success', 'Producto eliminado del carrito');
    }

    public function vaciar()
    {
        session()->forget('carrito');
        return redirect()->route('carrito.ver')->with('success', 'Carrito vaciado');
    }
}
