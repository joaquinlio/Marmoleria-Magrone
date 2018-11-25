<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendedor;
use App\Solicitud;
use Barryvdh\Snappy\Facades\SnappyPdf;
class SolicitudController extends Controller
{
    public function index()
    {
        $presupuestos = Solicitud::all();
        $title = 'Listado de Presupuestos';
        
    return view('presupuestos.index',compact('title','presupuestos'));
    }
    public function show($id)
    {
        $presupuesto = Solicitud::find($id);
        return view('presupuestos.show',compact('presupuesto'));
    }
    public function pdf($id)
    {      
        $presupuesto = Solicitud::find($id); 
        $pdf = SnappyPdf::loadView('presupuestos.imp',compact('presupuesto'));
        return $pdf->inline();
    }
    public function create()
    {
        $vendedores=Vendedor::all();
        return view('presupuestos.create',compact('vendedores'));
    }
    public function edit(Producto $producto)
    {
      return view('productos.edit',['producto' => $producto]);
    }

    public function update(Request $request)
    {
        $presupuesto = Solicitud::findOrFail($request->pto_id);

        $presupuesto->update($request->all());

        return redirect()->route('presupuestos.index');
    }
    public function destroy(Request $request)
    {
        $presupuesto = Solicitud::findOrFail($request->id);
        
        $presupuesto->delete();
        return redirect()->route('presupuestos.index');
    }
     public static function insertarPresupuesto(Request $request)
    {
        $array = json_decode($request->getContent(),true);
        //$json = '[{"productos":"","cliente":"1","profecional":"1","vendedor":"1","canalventa":"adrogue"}]';
        //$array = json_decode($json,true);
        //extract($obj);
        foreach($array as $obj){
          $cliente = $obj['cliente'];
          $profecional = $obj['profecional'];
          $vendedor = $obj['vendedor'];
          $productos = $obj['productos'];
          $canalventa = $obj['canalventa'];
        }
        $now = new \DateTime();
        $solicitud = Solicitud::create([
            'fecha' => $now->format('Y-m-d'),
            'cliente' => $cliente,
            'profecional' => $profecional,
            'vendedor' => $vendedor,
            'productos' => "$productos",
            'canaldeventa' => $canalventa,
            'estado' => "a confirmar"    
            ]);
        $datos = array(
            'pto_id' => $solicitud->pto_id
        );
        //dd($array[0]);
        //return response()->json($datos);
    }
    public static function insertarPedido(Request $request)
    {     
        $data = request()->validate([
            'fecha' => '',
            'cliente' => 'required',
            'profecional' => '',
            'vendedor' => 'required',
            'productos' => [
                            'required',
                            new pedidoVal()
                            ],
            'totalPed' => '',
            'descuento' => '',
            'senia' => '',
            'saldo' => '',
            'canaldeventa' => '',
            'estado' => 'required',
            'subEstado' => 'required',
            'imagen' => ''
            
        ],[
            'cliente.required' => 'Cliente no Seleccionado',
            'estado.required' => 'El campo Estado es Requerido',
            'subEstado.required' => 'No Selecciono Sub Estado',
            'vendedor.required' => 'No Selecciono Vendedor',
            'productos.required' => 'No Seleciono Productos',
        ]);
        $now = new \DateTime();
        $subEstado = null;
        foreach ($data['subEstado'] as $value) {
            $subEstado .= $value.",";
        }
        $subEstado = substr($subEstado, 0, -1);
        $post = Pedido::create([
            'fecha' => $now->format('Y-m-d'),
            'cliente' => $data['cliente'],
            'profecional' => $data['profecional'],
            'vendedor' => $data['vendedor'],
            'productos' => $data['productos'],
            'totalPed' => $data['totalPed'],
            'descuento' => $data['descuento'],
            'senia' => $data['senia'],
            'saldo' => $data['saldo'],
            'canaldeventa' => $data['canaldeventa'],
            'estado' => $data['estado'],
            'subEstado' => $subEstado 
        ]);
        if($request->file('imagen')){
            $path = Storage::disk('public')->put('imagen',  $request->file('imagen'));
            $post->fill(['imagen' => asset($path)])->save();
        }
        $pedido = Pedido::find($post->pdo_id);
        return view('pedidos.show',compact('pedido'));
        //dd($request->request);
    }
}
