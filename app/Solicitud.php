<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';
    protected $fillable = ['fecha', 'cliente', 'profesional','vendedor','productos','totalPed','descuento','senia','saldo','despacho','canaldeventa','estado','subEstado','finalizado','imagen','tipo'];
    protected $primaryKey = 'sol_id';
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

    public function scopeEstado($query, $estado)
    {
        if($estado)
            return $query->where('estado', 'LIKE', "%$estado%");
    }
    public function scopeFinalizado($query, $estado)
    {
        if($estado)
            return $query->orWhere('finalizado', 'LIKE', "%$estado%");
    }
    public function scopeDespacho($query, $estado)
    {
        if($estado)
            return $query->orWhere('despacho', 'LIKE', "%$estado%");
    }
}
