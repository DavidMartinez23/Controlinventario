<?php

namespace App\Http\Controllers;

use App\Models\PedidoCliente;
use App\Models\Cliente;
use App\Models\Producto; // Añade esta línea
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Añade esta línea

class PedidoClienteController extends Controller
{
    public function index()
    {
        $pedidos = PedidoCliente::with('cliente')->get();
        return view('pedidos_clientes.index', compact('pedidos'));
    }

    public function create()
    {
        $clientes = \App\Models\Cliente::all();
        $productos = \App\Models\Producto::all();
        return view('pedidos_clientes.create', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            // 'total' => 'required|numeric', // Eliminamos esta validación
            'productos' => 'required|array', // Asegura que 'productos' sea un array
            'productos.*.producto_id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0',
        ]);

        // Validar stock antes de procesar
        foreach ($request->productos as $producto) {
            $productoModel = Producto::find($producto['producto_id']);
            if ($productoModel->stock < $producto['cantidad']) {
                return back()->withInput()->with('error', 'Actualmente tienes ' . $productoModel->stock . ' unidades de ' . $productoModel->nombre . '. No es posible hacer el pedido');
            }
        }

        DB::transaction(function () use ($request) {
            $totalPedido = 0;
            foreach ($request->productos as $productoData) {
                $totalPedido += ($productoData['cantidad'] * $productoData['precio_unitario']);
            }

            $pedidoCliente = PedidoCliente::create([
                'cliente_id' => $request->cliente_id,
                'fecha' => $request->fecha,
                'total' => $totalPedido, // Asignamos el total calculado
            ]);

            foreach ($request->productos as $productoData) {
                $producto = Producto::find($productoData['producto_id']);
                if ($producto) {
                    $pedidoCliente->productos()->attach($producto->id, [
                        'cantidad' => $productoData['cantidad'],
                        'precio_unitario' => $productoData['precio_unitario'],
                    ]);
                    $producto->disminuirStock($productoData['cantidad'], 'Venta a cliente');
                }
            }
        });

        return redirect()->route('pedidos-clientes.index')->with('success', 'Pedido creado correctamente');
    }

    public function show(PedidoCliente $pedido_cliente)
    {
        return view('pedidos_clientes.show', compact('pedido_cliente'));
    }

    public function edit(PedidoCliente $pedido_cliente)
    {
        $clientes = Cliente::all();
        return view('pedidos_clientes.edit', compact('pedido_cliente', 'clientes'));
    }

    public function update(Request $request, PedidoCliente $pedido_cliente)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
        ]);
        $pedido_cliente->update($request->all());
        return redirect()->route('pedidos-clientes.index')->with('success', 'Pedido actualizado correctamente');
    }

    public function destroy(PedidoCliente $pedido_cliente)
    {
        $pedido_cliente->delete();
        return redirect()->route('pedidos-clientes.index')->with('success', 'Pedido eliminado correctamente');
    }
}
