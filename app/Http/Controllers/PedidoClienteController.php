<?php

namespace App\Http\Controllers;

use App\Models\PedidoCliente;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PedidoClienteController extends Controller
{
    public function index()
    {
        $pedidos = PedidoCliente::with('cliente')->get();
        return view('pedidos_clientes.index', compact('pedidos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('pedidos_clientes.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
        ]);
        PedidoCliente::create($request->all());
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
