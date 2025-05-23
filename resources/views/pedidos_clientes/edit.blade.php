@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Pedido de Cliente</h1>
    <form action="{{ route('pedidos-clientes.update', $pedido_cliente) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" class="form-control" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $pedido_cliente->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" value="{{ $pedido_cliente->fecha }}" required>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" step="0.01" name="total" class="form-control" value="{{ $pedido_cliente->total }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('pedidos-clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection