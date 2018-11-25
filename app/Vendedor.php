<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'vendedores';
    protected $fillable = ['nombre', 'telefono'];
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
