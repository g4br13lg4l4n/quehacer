<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
use App\Categoria;
class Publicidad extends Model
{
    protected $guarded = [];

    public function cliente()
    {
    	return $this->belongsTo(Cliente::class);
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

}
