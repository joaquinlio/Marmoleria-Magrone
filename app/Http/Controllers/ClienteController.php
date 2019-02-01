<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        //dd($productos);
        $title = 'Listado de Clientes';
        
    return view('clientes.index',compact('title','clientes'));
    }
    public function indexBuscador(Request $request)
    {
        $clientes = Cliente::orderBy('id')
                    ->nombre($request->buscadorCli)
                    ->get();;        
        $title = 'Listado de Clientes';
        
    return view('clientes.index',compact('title','clientes'));
    }
    public function create()
    {
        return view('clientes.create');
    }
    public function store()
    {
        $data = request()->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'entrecalles' => '',
            'observaciones' => '',
            'localidad' => '',
            'partido' => '',
            'provincia' => '',
            'telefono1' => 'required',
            'telefono2' => '',
            'factura' => '',
            'cuit' => '',
            'razonsocial' => ''
        ],[
            'nombre.required' => 'El campo nombre es Requerido'
        ]);
        Cliente::create([
            'nombre' => $data['nombre'],
            'direccion' => $data['direccion'],
            'entrecalles' => $data['entrecalles'],
            'observaciones' => $data['observaciones'],
            'localidad' => $data['localidad'],
            'partido' => $data['partido'],
            'provincia' => $data['provincia'],
            'telefono1' => $data['telefono1'],
            'telefono2' => $data['telefono2'],
            'factura' => $data['factura'],
            'cuit' => $data['cuit'],
            'razonsocial' => $data['razonsocial']     
        ]);
        
        return redirect()->route('clientes.index');
    }
    public function edit(Producto $producto)
    {
      return view('clientes.edit',['producto' => $producto]);
    }

    public function update(Request $request)
    {
        $cliente = Cliente::findOrFail($request->id);

        $cliente->update($request->all());

        return redirect()->route('clientes.index');
    }
    public function destroy(Request $request)
    {
        $cliente = Cliente::findOrFail($request->id);
        
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
    public function autocomplete(Request $request)
    {
        $data = Cliente::select("nombre as name")->where("nombre","LIKE","%{$request->input('query')}%")->get();
        
        return response()->json($data);
    }
    public static function obtenerdetalles(Request $request)
    {
        $data = Cliente::select()->where("nombre","LIKE","{$request->nombre}")->get();
        return json_encode($data);
    }
}
