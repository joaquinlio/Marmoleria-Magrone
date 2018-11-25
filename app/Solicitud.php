<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'pedidos';
    protected $fillable = ['fecha', 'cliente', 'profecional','vendedor','productos','totalPed','descuento','senia','saldo','despacho','canaldeventa','estado','subEstado','imagen'];
    protected $primaryKey = 'sol_id';
    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente');
    }

    public function profecional()
    {
        return $this->belongsTo(Profecional::class,'profecional');
    }
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class,'vendedor');
    }
}
