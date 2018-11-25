<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profecional extends Model
{
    protected $table = 'profecionales';
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
