@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Agregar Producto</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre ?? '-' }}</td>
                <td>{{ $producto->stock ?? '-' }}</td>
                <td>{{ $producto->precio ?? '-' }}</td>
                <td>
                    <!-- Aquí puedes agregar botones de editar/eliminar si lo deseas -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection