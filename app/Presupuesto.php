<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';
    protected $fillable = ['fecha', 'cliente', 'profecional','vendedor','productos','canaldeventa','estado'];
    protected $primaryKey = 'pto_id';
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
