<?php

namespace App\Http\Controllers;

use App\Models\PedidoCompra;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class PedidoCompraController extends Controller
{
    public function index()
    {
        $pedidos = PedidoCompra::with('proveedor')->get();
        return view('pedidos_compras.index', compact('pedidos'));
    }

    public function create()
    {
        $proveedors = Proveedor::all();
        return view('pedidos_compras.create', compact('proveedors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proveedor_id' => 'required|exists:proveedors,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
        ]);
        PedidoCompra::create($request->all());
        return redirect()->route('pedidos-compras.index')->with('success', 'Pedido de compra creado correctamente');
    }

    public function show(PedidoCompra $pedido_compra)
    {
        return view('pedidos_compras.show', compact('pedido_compra'));
    }

    public function edit(PedidoCompra $pedido_compra)
    {
        $proveedors = Proveedor::all();
        return view('pedidos_compras.edit', compact('pedido_compra', 'proveedors'));
    }

    public function update(Request $request, PedidoCompra $pedido_compra)
    {
        $request->validate([
            'proveedor_id' => 'required|exists:proveedors,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
        ]);
        $pedido_compra->update($request->all());
        return redirect()->route('pedidos-compras.index')->with('success', 'Pedido de compra actualizado correctamente');
    }

    public function destroy(PedidoCompra $pedido_compra)
    {
        $pedido_compra->delete();
        return redirect()->route('pedidos-compras.index')->with('success', 'Pedido de compra eliminado correctamente');
    }
}
