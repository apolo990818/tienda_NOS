@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>🛒 Tu Carrito de Compras</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(empty($carrito))
            <p class="text-center">El carrito está vacío.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carrito as $id => $producto)
                        <tr>
                            <td><img src="{{ $producto['imagen'] }}" width="50" alt="Imagen del producto"></td>
                            <td>{{ $producto['nombre'] }}</td>
                            <td>${{ number_format($producto['precio'], 2) }}</td>
                            <td>{{ $producto['cantidad'] }}</td>
                            <td>${{ number_format($producto['precio'] * $producto['cantidad'], 2) }}</td>
                            <td>
                                <form action="{{ route('carrito.eliminar', $id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">❌</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <form action="{{ route('carrito.vaciar') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">Vaciar Carrito 🗑</button>
            </form>
        @endif
    </div>

    <style>
        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }
    </style>
@endsection
