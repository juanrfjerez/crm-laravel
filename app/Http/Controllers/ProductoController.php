<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria' => 'nullable',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:4096'
        ]);

        $datos = $request->except(['imagen', 'pdf']);

        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('productos', 'public');
            $datos['imagen'] = $ruta;
        }

        if ($request->hasFile('pdf')) {
            $rutaPdf = $request->file('pdf')->store('pdfs', 'public');
            $datos['pdf'] = $rutaPdf;
        }

        Producto::create($datos);

        return redirect()->route('productos.index');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria' => 'nullable',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:4096'
        ]);

        $producto = Producto::findOrFail($id);

        $datos = $request->except(['imagen', 'pdf']);

        if ($request->hasFile('imagen')) {
            if ($producto->imagen && \Storage::disk('public')->exists($producto->imagen)) {
                \Storage::disk('public')->delete($producto->imagen);
            }
            $ruta = $request->file('imagen')->store('productos', 'public');
            $datos['imagen'] = $ruta;
        }

        if ($request->hasFile('pdf')) {
            if ($producto->pdf && \Storage::disk('public')->exists($producto->pdf)) {
                \Storage::disk('public')->delete($producto->pdf);
            }
            $rutaPdf = $request->file('pdf')->store('pdfs', 'public');
            $datos['pdf'] = $rutaPdf;
        }

        $producto->update($datos);

        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index');
    }
}