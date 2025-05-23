<div class="p-4 text-2xl font-bold border-b border-gray-700">
    Inventario
</div>
<ul class="flex-1 p-4 space-y-2">
    <li><a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard</a></li>
    <li><a href="{{ route('clientes.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Clientes</a></li>
    <li><a href="{{ route('proveedores.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Proveedores</a></li>
    <li><a href="{{ route('productos.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Productos</a></li>
    <li><a href="{{ route('pedidos-clientes.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Pedidos Clientes</a></li>
    <li><a href="{{ route('pedidos-compras.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Pedidos Compras</a></li>
</ul>
<div class="p-4 border-t border-gray-700">
    <a href="{{ route('profile.edit') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Perfil</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full text-left py-2 px-4 rounded hover:bg-gray-700">Cerrar sesión</button>
    </form>
</div>
