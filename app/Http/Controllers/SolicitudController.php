<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendedor;
use App\Canaldeventa;
use App\Solicitud;
use App\Rules\pedidoVal;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Support\Facades\Storage;
class SolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::all();
        $title = 'Listado de Solicitudes';
        
    return view('solicitudes.index',compact('title','solicitudes'));
    }
    public function indexPto()
    {
        $solicitudes = Solicitud::all()->where('tipo', 'Presupuesto');
        $title = 'Listado de Presupuestos';
        
    return view('solicitudes.presupuestos',compact('title','solicitudes'));
    }
    public function indexPtoEstado($estado)
    {
        $solicitudes = Solicitud::all()->where('estado', $estado);
        $title = 'Listado de Presupuestos';
        
    return view('solicitudes.presupuestos',compact('title','solicitudes'));
    }
    public function indexPed()
    {
        $solicitudes = Solicitud::all()->where('tipo', 'Pedido');
        $title = 'Listado de Pedidos';
        
    return view('solicitudes.pedidos',compact('title','solicitudes'));
    }
    public function indexPedEstado($estado)
    {
        /*$solicitudes = Solicitud::select('*')->where('estado', $estado)->orWhere(function($q) use ($estado){
            $q->orWhere('despacho','=', $estado);
        })->get();*/
        $solicitudes = Solicitud::orderBy('sol_id', 'DESC')
            ->estado($estado)
            ->finalizado($estado)
            ->despacho($estado)
    		->get();
        $title = 'Listado de Pedidos';
        
    return view('solicitudes.pedidos',compact('title','solicitudes'));
    }
    public function show($id)
    {
        $solicitud = Solicitud::find($id);
        return view('solicitudes.show',compact('solicitud'));
    }
    public function pdfPto($id)
    {      
        $solicitud = Solicitud::find($id); 
        $pdf = SnappyPdf::loadView('solicitudes.impPto',compact('solicitud'));
        return $pdf->inline();
    }
    public function pdfPed($id)
    {      
        $solicitud = Solicitud::find($id); 
        $pdf = SnappyPdf::loadView('solicitudes.impPed',compact('solicitud'));
        return $pdf->inline();
    }
    public function create()
    {
        $vendedores=Vendedor::all();
        $canalesdeventa= CanaldeVenta::all();
        return view('solicitudes.create',compact('vendedores','canalesdeventa'));
    }
    public function edit(Solicitud $solicitud)
    {
     $vendedores=Vendedor::all();
     $canalesdeventa= CanaldeVenta::all();

      return view('solicitudes.edit',['solicitud' => $solicitud],compact('vendedores','canalesdeventa'));
    }

    public function updatePedido(Request $request)
    {
        $solicitud = Solicitud::findOrFail($request->sol_id);

        //$solicitud->update($request->all());
       
        $data = request()->validate([
            'fecha' => '',
            'cliente' => 'required',
            'profesional' => '',
            'vendedor' => 'required',
            'productos' => [
                            'required',
                            new pedidoVal()
                            ],
            'totalPed' => '',
            'descuento' => '',
            'senia' => '',
            'saldo' => '',
            'despacho' => '',
            'canaldeventa' => '',
            'estado' => 'required',
            'subEstado' => '',
            'detalles' => '',
            'reclamoDet' => '',
            'imagen' => ''
            
        ],[
            'cliente.required' => 'Cliente no Seleccionado',
            'estado.required' => 'El campo Estado es Requerido',
            'vendedor.required' => 'No Selecciono Vendedor',
            'productos.required' => 'No Seleciono Productos',
        ]);
        $subEstado = null;
        if ($request->has('subEstado')) {
            foreach ($data['subEstado'] as $value) {
                $subEstado .= $value.",";
            }
            $subEstado = substr($subEstado, 0, -1);
        }
        
        $solicitud->update([
            'cliente' => $data['cliente'],
            'profesional' => $data['profesional'],
            'vendedor' => $data['vendedor'],
            'productos' => $data['productos'],
            'totalPed' => $data['totalPed'],
            'descuento' => $data['descuento'],
            'senia' => $data['senia'],
            'saldo' => $data['saldo'],
            'despacho' => $data['despacho'],
            'canaldeventa' => $data['canaldeventa'],
            'estado' => $data['estado'],
            'subEstado' => $subEstado,
            'detalles' => $data['detalles'],
            'reclamoDet' => $data['reclamoDet'],
            'tipo' => "Pedido" 
        ]);
        //dd($data['reclamoDet']);
        if($request->file('imagen')){
            $path = Storage::disk('public')->put('imagen',  $request->file('imagen'));
            $solicitud->fill(['imagen' => asset($path)])->save();
        }
        //dd($request->all());
        return redirect()->route('solicitudes.index');
    }
    public function updatePresupuesto(Request $request)
    {
        $array = json_decode($request->getContent(),true);
        //$json = '[{"sol_id":25,"productos":"Granito-Blanco-20mm,1500,3,4500,,opcion1,/Ajuste y Colocacion,12000,1,12000,,Todos","cliente":"2","profesional":"1","vendedor":"1","canalventa":"adrogue"}]';
        //$array = json_decode($json,true);
        foreach($array as $obj){
          $sol_id = $obj['sol_id'];
          $cliente = $obj['cliente'];
          $profesional = $obj['profesional'];
          $vendedor = $obj['vendedor'];
          $productos = $obj['productos'];
          $canalventa = $obj['canalventa'];
        }
        $solicitud = Solicitud::findOrFail($sol_id);

        $solicitud->update([
            'cliente' => $cliente,
            'profesional' => $profesional,
            'vendedor' => $vendedor,
            'productos' => "$productos",
            'canaldeventa' => $canalventa
            ]);
        return response()->json($array);
        //return redirect()->route('solicitudes.index');
    }
    public function destroy(Request $request)
    {
        $presupuesto = Solicitud::findOrFail($request->sol_id);
        
        $presupuesto->delete();
        return redirect()->route('solicitudes.index');
    }
     public static function insertarPresupuesto(Request $request)
    {
        $array = json_decode($request->getContent(),true);
        //$json = '[{"productos":"Granito-Blanco-20mm,1500,3,4500,,opcion1,/Ajuste y Colocacion,12000,1,12000,,Todos","cliente":"1","vendedor":"1","canalventa":"adrogue"}]';
        //$array = json_decode($json,true);
        foreach($array as $obj){
          $cliente = $obj['cliente'];
          $profesional = $obj['profesional'];
          $vendedor = $obj['vendedor'];
          $productos = $obj['productos'];
          $canalventa = $obj['canalventa'];
        }
        $now = new \DateTime();
        $solicitud = Solicitud::create([
            'fecha' => $now->format('Y-m-d'),
            'cliente' => $cliente,
            'profesional' => $profesional,
            'vendedor' => $vendedor,
            'productos' => "$productos",
            'canaldeventa' => $canalventa,
            'estado' => "a confirmar",
            'tipo' => "Presupuesto"    
            ]);
        $datos = array(
            'sol_id' => $solicitud->sol_id
        );
        //dd($array[0]);
        return response()->json($datos);
    }
    public static function insertarPedido(Request $request)
    {     
        $data = request()->validate([
            'fecha' => '',
            'cliente' => 'required',
            'profesional' => '',
            'vendedor' => 'required',
            'productos' => [
                            'required',
                            new pedidoVal()
                            ],
            'totalPed' => '',
            'descuento' => '',
            'senia' => '',
            'saldo' => '',
            'despacho' => '',
            'canaldeventa' => '',
            'estado' => 'required',
            'subEstado' => 'required',
            'detalles' => 'required',
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
        $post = Solicitud::create([
            'fecha' => $now->format('Y-m-d'),
            'cliente' => $data['cliente'],
            'profesional' => $data['profesional'],
            'vendedor' => $data['vendedor'],
            'productos' => $data['productos'],
            'totalPed' => $data['totalPed'],
            'descuento' => $data['descuento'],
            'senia' => $data['senia'],
            'saldo' => $data['saldo'],
            'despacho' => $data['despacho'],
            'canaldeventa' => $data['canaldeventa'],
            'estado' => $data['estado'],
            'subEstado' => $subEstado,
            'detalles' => $data['detalles'],
            'tipo' => "Pedido" 
        ]);
        if($request->file('imagen')){
            $path = Storage::disk('public')->put('imagen',  $request->file('imagen'));
            $post->fill(['imagen' => asset($path)])->save();
        }
        $solicitud = Solicitud::find($post->sol_id);
        return view('solicitudes.show',compact('solicitud'));
        //dd($request->request);
    }
    public function buscardor(Request $request)
    {
        //$data = Solicitud::where("sol_id","LIKE","%{$request->input('query')}%")->orWhere("tipo","LIKE","%{$request->input('query')}%")->get();
        $data = Solicitud::where("sol_id","$request->dato")->get();
        //dd($data);
        return response()->json($data);
    }
}
