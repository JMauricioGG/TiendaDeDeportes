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

    public function store(Request $request) {
    $request->validate([
        'nombre' => 'required',
        'categoria_id' => 'required',
    ]);
    Producto::create($request->all());
    return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
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
        'categoria_id' => 'required|exists:categorias,id',
    ]);

    $producto = Producto::findOrFail($id);
    $producto->nombre = $request->nombre;
    $producto->categoria_id = $request->categoria_id;
    $producto->save();

    return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
}

    public function destroy($id)
    {$producto = Producto::findOrFail($id);
    $producto->delete();

    return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}
