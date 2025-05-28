@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Pedido de Cliente</h1>
    <form action="{{ route('pedidos-clientes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" class="form-control" required>
                <option value="">Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
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
            <label for="productos" class="form-label">Productos</label>
            <table class="table" id="productos-table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name="productos[0][producto_id]" class="form-control" required>
                                <option value="">Seleccione producto</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" name="productos[0][cantidad]" class="form-control" min="1" required></td>
                        <td><input type="number" name="productos[0][precio_unitario]" class="form-control" min="0" step="0.01" required></td>
                        <td><button type="button" class="btn btn-danger remove-row">Eliminar</button></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" id="add-product">Agregar Producto</button>
        </div>
        <script>
        document.getElementById('add-product').addEventListener('click', function() {
            var table = document.getElementById('productos-table').getElementsByTagName('tbody')[0];
            var rowCount = table.rows.length;
            var row = table.rows[0].cloneNode(true);
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
        <a href="{{ route('pedidos-clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@if(session('error'))
    <div class="modal fade show" id="errorModal" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Error de Stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('error') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#errorModal').modal('show');
        });
    </script>
@endif
@endsection