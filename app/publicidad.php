<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
class Publicidad extends Model
{
    protected $guarded = [];

    public function clientes()
    {
    	return $this->belongsTo(Cliente::class);
    //    return $this->hasMany(Cliente::class);
    }

}
