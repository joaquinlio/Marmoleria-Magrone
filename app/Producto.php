<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos/extras';
    protected $fillable = ['nombre', 'descripcion','precio'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
