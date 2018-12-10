<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profesional;
class profesionalController extends Controller
{
    public function index()
    {
        $profesionales = profesional::all();
        //dd($productos);
        $title = 'Listado de profesionales';
        
    return view('profesionales.index',compact('title','profesionales'));
    }
    public function indexBuscador(Request $request)
    {
        $profesionales = profesional::orderBy('id')
                    ->nombre($request->buscadorPro)
                    ->get();;        
        $title = 'Listado de Profesionales';
        
    return view('profesionales.index',compact('title','profesionales'));
    }
    public function create()
    {
        return view('profesionales.create');
    }
    public function store()
    {
        $data = request()->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'email' => ''
        ],[
            'nombre.required' => 'El campo nombre es Requerido'
        ]);
        profesional::create([
            'nombre' => $data['nombre'],
            'telefono' => $data['telefono'],
            'email' => $data['email']    
        ]);
        
        return redirect()->route('profesionales.index');
    }
    public function update(Request $request)
    {
        $profesional = profesional::findOrFail($request->id);

        $Profesional->update($request->all());

        return redirect()->route('profesionales.index');
    }
    public function destroy(Request $request)
    {
        $profesional = profesional::findOrFail($request->id);
        
        $Profesional->delete();
        return redirect()->route('profesionales.index');
    }
    public function autocomplete(Request $request)
    {
        $data = profesional::select("nombre as name")->where("nombre","LIKE","%{$request->input('query')}%")->get();
        
        return response()->json($data);
    }
    public static function obtenerdetalles(Request $request)
    {
        $data = profesional::select()->where("nombre","LIKE","{$request->nombre}")->get();
        return json_encode($data);
    }
}
