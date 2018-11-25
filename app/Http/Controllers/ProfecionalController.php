<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profecional;
class ProfecionalController extends Controller
{
    public function index()
    {
        $profecionales = Profecional::all();
        //dd($productos);
        $title = 'Listado de Profecionales';
        
    return view('profecionales.index',compact('title','profecionales'));
    }
    public function create()
    {
        return view('profecionales.create');
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
        Profecional::create([
            'nombre' => $data['nombre'],
            'telefono' => $data['telefono'],
            'email' => $data['email']    
        ]);
        
        return redirect()->route('profecionales.index');
    }
    public function update(Request $request)
    {
        $profecional = Profecional::findOrFail($request->id);

        $profecional->update($request->all());

        return redirect()->route('profecionales.index');
    }
    public function destroy(Request $request)
    {
        $profecional = Profecional::findOrFail($request->id);
        
        $profecional->delete();
        return redirect()->route('profecionales.index');
    }
    public function autocomplete(Request $request)
    {
        $data = Profecional::select("nombre as name")->where("nombre","LIKE","%{$request->input('query')}%")->get();
        
        return response()->json($data);
    }
    public static function obtenerdetalles(Request $request)
    {
        $data = Profecional::select()->where("nombre","LIKE","{$request->nombre}")->get();
        return json_encode($data);
    }
}
