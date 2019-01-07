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
        //return view('solicitudes.impPto',compact('solicitud'));
    }
    public function pdfPed($id)
    {      
        $solicitud = Solicitud::find($id); 
        $pdf = SnappyPdf::loadView('solicitudes.impPed',compact('solicitud'));
        return $pdf->inline();
    }
    public function imgPed($id)
    {      
        $solicitud = Solicitud::find($id); 
        return view('solicitudes.impImg',compact('solicitud'));
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
            'nomCli' => 'required',
            'profesional' => '',
            'nomPro' => '',
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
            'obra' => '',
            'estado' => 'required',
            'subEstado' => '',
            'detalles' => '',
            'observacion' => '',
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
            'nomCli' => $data['nomCli'],
            'profesional' => $data['profesional'],
            'nomPro' => $data['nomPro'],
            'vendedor' => $data['vendedor'],
            'productos' => $data['productos'],
            'totalPed' => $data['totalPed'],
            'descuento' => $data['descuento'],
            'senia' => $data['senia'],
            'saldo' => $data['saldo'],
            'despacho' => $data['despacho'],
            'canaldeventa' => $data['canaldeventa'],
            'obra' => $data['obra'],
            'estado' => $data['estado'],
            'subEstado' => $subEstado,
            'detalles' => $data['detalles'],
            'observacion' => $data['observacion'],
            'reclamoDet' => $data['reclamoDet'],
            'tipo' => "Pedido" 
        ]);
        //dd($data['canaldeventa']);
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
          $observacion = $obj['observacion'];
          $obra= $obj['obra'];
        }
        $solicitud = Solicitud::findOrFail($sol_id);

        $solicitud->update([
            'cliente' => $cliente,
            'profesional' => $profesional,
            'vendedor' => "$vendedor",
            'productos' => "$productos",
            'canaldeventa' => "$canalventa",
            'observacion' => "$observacion",
            'obra' => "$obra"
            ]);
        return response()->json($solicitud->sol_id);
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
        //$json = '[{"productos":"Granito-Blanco-20mm,1500,3,4500,,opcion1,/Ajuste y Colocacion,12000,1,12000,,Todos","cliente":"1","nomCli":"Carlos Lio","profesional":"1","nomPro":"alberto","vendedor":"1","canalventa":"adrogue"}]';
        //$array = json_decode($json,true);
        foreach($array as $obj){
          $cliente = $obj['cliente'];
          $nomCli = $obj['nomCli'];
          $profesional = $obj['profesional'];
          $nomPro = $obj['nomPro'];
          $vendedor = $obj['vendedor'];
          $productos = $obj['productos'];
          $canalventa = $obj['canalventa'];
          $observacion = $obj['observacion'];
          $obra= $obj['obra'];
        }
        $now = new \DateTime();
        $solicitud = Solicitud::create([
            'fecha' => $now->format('Y-m-d'),
            'cliente' => $cliente,
            'nomCli' => "$nomCli",
            'profesional' => $profesional,
            'nomPro' => "$nomPro",
            'vendedor' => "$vendedor",
            'productos' => "$productos",
            'canaldeventa' => "$canalventa",
            'observacion' => "$observacion",
            'estado' => "a confirmar",
            'tipo' => "Presupuesto",
            'obra' => "$obra"    
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
            'nomCli' => 'required',
            'profesional' => '',
            'nomPro' => '',
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
            'obra' => '',
            'observacion' => '',
            'estado' => 'required',
            'subEstado' => 'required',
            'detalles' => '',
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
            'nomCli' => $data['nomCli'],
            'profesional' => $data['profesional'],
            'nomPro' => $data['nomPro'],
            'vendedor' => $data['vendedor'],
            'productos' => $data['productos'],
            'totalPed' => $data['totalPed'],
            'descuento' => $data['descuento'],
            'senia' => $data['senia'],
            'saldo' => $data['saldo'],
            'despacho' => $data['despacho'],
            'canaldeventa' => $data['canaldeventa'],
            'obra' => $data['obra'],
            'observacion' => $data['observacion'],
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
        $pdf = SnappyPdf::loadView('solicitudes.impPed',compact('solicitud'));
        return $pdf->inline();
    }
    public function buscador(Request $request)
    {
        $solicitudes = Solicitud::orderBy('sol_id')
        ->id($request->buscadorSol)
        //->productos($request->buscadorSol)
        ->cliente($request->buscadorSol)
        ->profesional($request->buscadorSol)
        ->vendedor($request->buscadorSol)
        ->estado($request->buscadorSol)
        ->finalizado($request->buscadorSol)
        ->despacho($request->buscadorSol)
        ->obra($request->buscadorSol)
        ->get();
        $title = 'Listado de Solicitudes';
        //dd($solicitudes);
        return view('solicitudes.index',compact('title','solicitudes'));
    }
}
