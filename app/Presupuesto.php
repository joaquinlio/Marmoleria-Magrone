<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';
    protected $fillable = ['fecha', 'cliente', 'profesional','vendedor','productos','canaldeventa','estado'];
    protected $primaryKey = 'pto_id';
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
