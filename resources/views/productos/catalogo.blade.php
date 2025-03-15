@extends('layouts.app')

@section('content')
    <h1>Catálogo de Productos</h1>
    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4">
                <div class="card">
                @if($producto->image)
                    <img src="{{ asset('storage/' . $producto->image) }}" alt="{{ $producto->nombre }}" width="100">
                @else
                    Sin imagen
                @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text">Precio: ${{ $producto->precio }}</p>
                        
                        <!-- Botón para agregar al carrito -->
                        <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success add-to-cart">Agregar al carrito 🛒</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <style>
        .add-to-cart {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .add-to-cart:hover {
            background-color: #28a745;
            transform: scale(1.05);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
@endsection
