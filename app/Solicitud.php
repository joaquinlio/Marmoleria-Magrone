<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';
    protected $fillable = ['fecha', 'cliente','nomCli', 'profesional','nomPro','vendedor','productos','totalPed','descuento','senia','saldo','despacho','canaldeventa','estado','subEstado','detalles','reclamoDet','imagen','tipo'];
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
    public function scopeId($query, $estado)
    {
        if($estado)
            return $query->where('sol_id', 'LIKE', "%$estado%");
    }
    public function scopeProductos($query, $estado)
    {
        if($estado)
            return $query->orWhere('productos', 'LIKE', "%$estado%");
    }
    public function scopeCliente($query, $estado)
    {
        if($estado)
            return $query->orWhere('nomCli', 'LIKE', "%$estado%");
    }
    public function scopeProfesional($query, $estado)
    {
        if($estado)
            return $query->orWhere('nomPro', 'LIKE', "%$estado%");
    }
    public function scopeVendedor($query, $estado)
    {
        if($estado)
            return $query->orWhere('vendedor', 'LIKE', "%$estado%");
    }
    public function scopeEstado($query, $estado)
    {
        if($estado)
            return $query->orWhere('estado', 'LIKE', "%$estado%");
    }
    public function scopeFinalizado($query, $estado)
    {
        if($estado)
            return $query->orWhere('subEstado', 'LIKE', "%$estado%");
    }
    public function scopeDespacho($query, $estado)
    {
        if($estado)
            return $query->orWhere('despacho', 'LIKE', "%$estado%");
    }
}
