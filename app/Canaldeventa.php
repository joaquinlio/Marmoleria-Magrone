<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canaldeventa extends Model
{
    protected $table = 'canaldeventa';
    protected $fillable = ['id', 'nombre'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
