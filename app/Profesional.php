<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profesional extends Model
{
    protected $table = 'profesionales';
    protected $fillable = ['nombre', 'telefono', 'email'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    public function presupuesto()
    {
    return $this->hasMany(Presupuesto::class);
    }
    public function pedido()
    {
    return $this->hasMany(Pedido::class);
    }
}
