<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;    

class productoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('nombreProducto')->paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:products,codigo',
            'nombreProducto' => 'required|max:120',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric|min:0',
            'unidades' => 'required|integer|min:0',
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|unique:products,codigo,' . $id,
            'nombreProducto' => 'required|max:120',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric|min:0',
            'unidades' => 'required|integer|min:0',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
