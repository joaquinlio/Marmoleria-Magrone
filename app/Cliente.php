<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['nombre', 'direccion', 'entrecalles','observaciones','localidad','partido','provincia','telefono1','telefono2','factura','cuit','razonsocial'];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function presupuesto()
    {
    return $this->hasMany(Presupuesto::class);
    }
    public function scopeNombre($query, $buscadorCli)
    {
        if($buscadorCli)
            return $query->where('nombre', 'LIKE', "%$buscadorCli%");
    }

}
