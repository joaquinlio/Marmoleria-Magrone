<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        //dd($productos);
        $title = 'Listado de Productos';
        
    return view('productos.index',compact('title','productos'));
    }
    public function indexBuscador(Request $request)
    {
        $productos = Producto::orderBy('id')
                    ->nombre($request->buscadorPro)
                    ->get();;        
        $title = 'Listado de Productos';
        
    return view('productos.index',compact('title','productos'));
    }
    public function create()
    {
        return view('productos.create');
    }
    public function store()
    {
        $data = request()->validate([
            'nombre' => 'required',
            'precio' => 'required'
        ],[
            'nombre.required' => 'El campo nombre es Requerido',
            'precio.required' => 'El campo precio es Requerido'
        ]);
        Producto::create([
            'nombre'=> $data['nombre'],
            'precio'=> $data['precio']     
        ]);
        return redirect()->route('productos.index');
    }
    public function edit(Producto $producto)
    {
      return view('productos.edit',['producto' => $producto]);
    }

    public function update(Request $request)
    {
        $producto = Producto::findOrFail($request->id);

        $producto->update($request->all());

        return redirect()->route('productos.index');
    }
    public function destroy(Request $request)
    {
        $producto = Producto::findOrFail($request->id);
        
        $producto->delete();
        return redirect()->route('productos.index');
    }
    public function autocomplete(Request $request)
    {
        $data = Producto::select("nombre as name")->where("nombre","LIKE","%{$request->input('query')}%")->get();
        //dd($data);
        return response()->json($data);
    }
    public static function obtenerdetalles(Request $request)
    {
        $data = Producto::select()->where("productos/extras.nombre","LIKE","%{$request->nombre}%")->get();
        /*$data = Producto::select()->where("productos/extras.nombre","LIKE","ACERO INOXIDABLE 304 18-8 - 40 -")->get();
        dd(json_encode($data));*/
        return json_encode($data);
    }
}