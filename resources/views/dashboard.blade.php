@extends('layouts.app')

@section('content')
<div class="p-8">
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded shadow p-6 text-center">
            <div class="text-gray-500">Clientes</div>
            <div class="text-2xl font-bold">{{ \App\Models\Cliente::count() }}</div>
        </div>
        <div class="bg-white rounded shadow p-6 text-center">
            <div class="text-gray-500">Proveedores</div>
            <div class="text-2xl font-bold">{{ \App\Models\Proveedor::count() }}</div>
        </div>
        <div class="bg-white rounded shadow p-6 text-center">
            <div class="text-gray-500">Productos</div>
            <div class="text-2xl font-bold">{{ \App\Models\Producto::count() }}</div>
        </div>
        <div class="bg-white rounded shadow p-6 text-center">
            <div class="text-gray-500">Pedidos Clientes</div>
            <div class="text-2xl font-bold">{{ \App\Models\PedidoCliente::count() }}</div>
        </div>
        <div class="bg-white rounded shadow p-6 text-center">
            <div class="text-gray-500">Pedidos Compras</div>
            <div class="text-2xl font-bold">{{ \App\Models\PedidoCompra::count() }}</div>
        </div>
    </div>
    <!-- Puedes agregar más secciones aquí, como gráficos, tablas, etc. -->
</div>
@endsection
