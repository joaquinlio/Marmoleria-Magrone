<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendedor;
use App\Presupuesto;
use Barryvdh\Snappy\Facades\SnappyPdf;
class PresupuestoController extends Controller
{
    public function index()
    {
        $presupuestos = Presupuesto::all();
        $title = 'Listado de Presupuestos';
        
    return view('presupuestos.index',compact('title','presupuestos'));
    }
    public function show($id)
    {
        $presupuesto = Presupuesto::find($id);
        return view('presupuestos.show',compact('presupuesto'));
    }
    public function pdf($id)
    {      
        $presupuesto = Presupuesto::find($id); 
        $pdf = SnappyPdf::loadView('presupuestos.imp',compact('presupuesto'));
        return $pdf->inline();
    }
    public function create()
    {
        $vendedores=Vendedor::all();
        return view('presupuestos.create',compact('vendedores'));
    }
    public function store()
    {
        $data = request()->validate([
            'fecha' => 'required',
            'cliente' => 'required',
            'profesional' => '',
            'productos' => 'required',
            'estado' => 'required',
            'detalle' => ''
            
        ],[
            'nombre.required' => 'El campo nombre es Requerido'
        ]);
        Presupuesto::create([
            'fecha' => $data['fecha'],
            'cliente' => $data['cliente'],
            'profesional' => $data['profesional'],
            'productos' => $data['productos'],
            'total' => $data['total'],
            'estado' => $data['estado']    
        ]);
        
        return redirect()->route('presupuestos.index');
    }
    public function edit(Producto $producto)
    {
      return view('productos.edit',['producto' => $producto]);
    }

    public function update(Request $request)
    {
        $presupuesto = Presupuesto::findOrFail($request->pto_id);

        $presupuesto->update($request->all());

        return redirect()->route('presupuestos.index');
    }
    public function destroy(Request $request)
    {
        $presupuesto = Presupuesto::findOrFail($request->id);
        
        $presupuesto->delete();
        return redirect()->route('presupuestos.index');
    }
    public static function insertar(Request $request)
    {
        $array = json_decode($request->getContent(),true);
        //$json = '[{"productos":"","cliente":"1","profesional":"1","vendedor":"1","canalventa":"adrogue"}]';
        //$array = json_decode($json,true);
        //extract($obj);
        foreach($array as $obj){
          $cliente = $obj['cliente'];
          $profesional = $obj['profesional'];
          $vendedor = $obj['vendedor'];
          $productos = $obj['productos'];
          $canalventa = $obj['canalventa'];
        }
        $now = new \DateTime();
        $presupuesto = Presupuesto::create([
            'fecha' => $now->format('Y-m-d'),
            'cliente' => $cliente,
            'profesional' => $profesional,
            'vendedor' => $vendedor,
            'productos' => "$productos",
            'canaldeventa' => $canalventa,
            'estado' => "a confirmar"    
            ]);
        $datos = array(
            'pto_id' => $presupuesto->pto_id
        );
        //dd($array[0]);
        return response()->json($datos);
    }
}
