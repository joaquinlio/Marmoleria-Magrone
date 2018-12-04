<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = ['fecha', 'cliente', 'profesional','vendedor','productos','totalPed','descuento','senia','saldo','despacho','canaldeventa','estado','subEstado','imagen'];
    protected $primaryKey = 'pdo_id';
    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente');
    }

    public function profesional()
    {
        return $this->belongsTo(profesional::class,'profesional');
    }
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class,'vendedor');
    }
}
