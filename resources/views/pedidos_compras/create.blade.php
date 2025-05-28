@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Pedido de Compra</h1>
    <form action="{{ route('pedidos-compras.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="proveedor_id" class="form-label">Proveedor</label>
            <select name="proveedor_id" class="form-control" required>
                <option value="">Seleccione un proveedor</option>
                @foreach($proveedors as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" step="0.01" name="total" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="productos" class="form-label">Products</label>
            <table class="table" id="productos-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name="productos[0][id]" class="form-control" required>
                                <option value="">Select product</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" name="productos[0][cantidad]" class="form-control" min="1" required></td>
                        <td><input type="number" name="productos[0][precio_unitario]" class="form-control" min="0" step="0.01" required></td>
                        <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" id="add-product">Add Product</button>
        </div>
        <script>
        document.getElementById('add-product').addEventListener('click', function() {
            var table = document.getElementById('productos-table').getElementsByTagName('tbody')[0];
            var rowCount = table.rows.length;
            var row = table.rows[0].cloneNode(true);
            // Update input names
            row.querySelectorAll('select, input').forEach(function(input) {
                var name = input.getAttribute('name');
                if (name) {
                    input.setAttribute('name', name.replace(/\d+/, rowCount));
                    if (input.tagName === 'INPUT') input.value = '';
                }
            });
            table.appendChild(row);
        });
        document.getElementById('productos-table').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-row')) {
                var table = document.getElementById('productos-table').getElementsByTagName('tbody')[0];
                if (table.rows.length > 1) e.target.closest('tr').remove();
            }
        });
        </script>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('pedidos-compras.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection