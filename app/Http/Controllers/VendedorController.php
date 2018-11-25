<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendedor;
class VendedorController extends Controller
{
    public function index()
    {
        $vendedores = Vendedor::all();
        //dd($productos);
        $title = 'Listado de Vendedores';
        
    return view('vendedores.index',compact('title','vendedores'));
    }
    public function create()
    {
        return view('vendedores.create');
    }
    public function store()
    {
        $data = request()->validate([
            'nombre' => 'required',
            'telefono' => ''
        ],[
            'nombre.required' => 'El campo nombre es Requerido'
        ]);
        Vendedor::create([
            'nombre' => $data['nombre'],
            'telefono' => $data['telefono']     
        ]);
        
        return redirect()->route('vendedores.index');
    }
    public function update(Request $request)
    {
        $vendedor = Vendedor::findOrFail($request->id);

        $vendedor->update($request->all());

        return redirect()->route('vendedores.index');
    }
    public function destroy(Request $request)
    {
        $vendedor = Vendedor::findOrFail($request->id);
        
        $vendedor->delete();
        return redirect()->route('vendedores.index');
    }
    public function autocomplete(Request $request)
    {
        $data = Vendedor::select("nombre as name")->where("nombre","LIKE","%{$request->input('query')}%")->get();
        
        return response()->json($data);
    }
    public static function obtenerdetalles(Request $request)
    {
        $data = Vendedor::select()->where("nombre","LIKE","{$request->nombre}")->get();
        return json_encode($data);
    }
}
