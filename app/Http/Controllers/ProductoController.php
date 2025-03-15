<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Muestra el catálogo de productos (solo los que NO están eliminados).
     */
    public function catalogo()
    {
        $productos = Producto::whereNull('deleted_at')->get();
        return view('productos.catalogo', compact('productos'));
    }

    /**
     * Muestra la lista completa de productos (incluidos los eliminados).
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Guarda un nuevo producto en la base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio'      => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $validated['usuario_id'] = Auth::id();
        Producto::create($validated);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Muestra un producto específico.
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Muestra el formulario de edición para un producto.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Actualiza un producto en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $validated = $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio'      => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Elimina la imagen anterior si existe
            if ($producto->image) {
                Storage::disk('public')->delete($producto->image);
            }
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $producto->update($validated);
        return redirect()->route('productos.index')->with('success', 'Producto actualizado.');
    }

    /**
     * "Elimina" un producto (soft delete: solo asigna `deleted_at` con la fecha actual).
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update(['deleted_at' => now()]);

        return redirect()->route('productos.index')->with('success', 'Producto eliminado (soft delete).');
    }

    /**
     * Restaura un producto eliminado.
     */
    public function restore($id)
    {
        $producto = Producto::whereNotNull('deleted_at')->findOrFail($id);
        $producto->update(['deleted_at' => null]);

        return redirect()->route('productos.index')->with('success', 'Producto restaurado.');
    }
}
