<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedors = Proveedor::paginate(10); // Cambiado de all() a paginate()
        return view('proveedores.index', compact('proveedors'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:proveedors,email',
            'telefono' => 'nullable|string',
            'direccion' => 'nullable|string',
        ]);
        Proveedor::create($request->all());
        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado correctamente');
    }

    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:proveedors,email,' . $proveedor->id,
            'telefono' => 'nullable|string',
            'direccion' => 'nullable|string',
        ]);
        $proveedor->update($request->all());
        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente');
    }
}
