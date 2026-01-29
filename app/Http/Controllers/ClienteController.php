<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'email' => 'required|email',
        'telefono' => 'nullable',
        'direccion' => 'nullable',
    ]);

    Cliente::create($request->all());
    return redirect()->route('clientes.index');
}

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required',
        'email' => 'required|email',
        'telefono' => 'nullable',
        'direccion' => 'nullable',
    ]);

    $cliente = Cliente::findOrFail($id);
    $cliente->update($request->all());
    return redirect()->route('clientes.index');
}

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}