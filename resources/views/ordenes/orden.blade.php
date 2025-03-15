@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis Órdenes</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordenes as $orden)
            <tr>
                <td>{{ $orden->id }}</td>
                <td>{{ $orden->cliente }}</td>
                <td>${{ number_format($orden->total, 2) }}</td>
                <td>{{ $orden->estado }}</td>
                <td><a href="{{ route('ordenes.show', $orden->id) }}" class="btn btn-primary">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

