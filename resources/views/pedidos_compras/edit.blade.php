@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Pedido de Compra</h1>
    <form action="{{ route('pedidos-compras.update', $pedido_compra) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="proveedor_id" class="form-label">Proveedor</label>
            <select name="proveedor_id" class="form-control" required>
                @foreach($proveedors as $proveedor)
                    <option value="{{ $proveedor->id }}" {{ $pedido_compra->proveedor_id == $proveedor->id ? 'selected' : '' }}>{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" value="{{ $pedido_compra->fecha }}" required>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" step="0.01" name="total" class="form-control" value="{{ $pedido_compra->total }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('pedidos-compras.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection