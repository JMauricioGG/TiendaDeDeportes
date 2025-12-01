<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        
        $productos = Producto::with('categoria')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric|min:1',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')
                         ->with('success', 'Producto creado correctamente');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric|min:1',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->only('nombre', 'precio', 'categoria_id'));

        return redirect()->route('productos.index')
                         ->with('success', 'Producto actualizado correctamente');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete(); 

        return redirect()->route('productos.index')
                         ->with('success', 'Producto eliminado correctamente');
    }
}
