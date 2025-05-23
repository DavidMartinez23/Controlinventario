@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pedidos de Clientes</h1>
    <a href="{{ route('pedidos-clientes.create') }}" class="btn btn-primary mb-3">Agregar Pedido</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->cliente->nombre }}</td>
                <td>{{ $pedido->fecha }}</td>
                <td>{{ $pedido->total }}</td>
                <td>
                    <a href="{{ route('pedidos-clientes.edit', $pedido) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('pedidos-clientes.destroy', $pedido) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection