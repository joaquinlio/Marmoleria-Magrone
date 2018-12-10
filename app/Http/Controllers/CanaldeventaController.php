<?php

namespace App\Http\Controllers;
use App\Canaldeventa;
use Illuminate\Http\Request;

class CanaldeventaController extends Controller
{
    public function index()
    {
        $canalesdeventa = Canaldeventa::all();
        //dd($productos);
        $title = 'Listado de Canales de Venta';
        
    return view('canalesdeventa.index',compact('title','canalesdeventa'));
    }
    public function create()
    {
        return view('canalesdeventa.create');
    }
    public function store()
    {
        $data = request()->validate([
            'nombre' => 'required'
        ],[
            'nombre.required' => 'El campo nombre es Requerido'
        ]);
        Canaldeventa::create([
            'nombre' => $data['nombre']
        ]);
        
        return redirect()->route('canalesdeventa.index');
    }
    public function update(Request $request)
    {
        $canaldeventa = Canaldeventa::findOrFail($request->id);

        $canaldeventa->update($request->all());

        return redirect()->route('canalesdeventa.index');
    }
    public function destroy(Request $request)
    {
        $canaldeventa = Canaldeventa::findOrFail($request->id);
        
        $canaldeventa->delete();
        return redirect()->route('canalesdeventa.index');
    }
}
