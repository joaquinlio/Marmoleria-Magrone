<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Support\Facades\Storage;
use App\Rules\pedidoVal;
class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        
    return view('pedidos.index',compact('pedidos'));
    }
    public function show($id)
    {
        $pedido = Pedido::find($id);
        return view('pedidos.show',compact('pedido'));
    }
    public function pdf($id)
    {      
        $pedido = Pedido::find($id); 
        $pdf = SnappyPdf::loadView('pedidos.imp',compact('pedido'));
        return $pdf->inline();
    }
    public static function insertar(Request $request)
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
