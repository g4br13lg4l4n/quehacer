<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
class Publicidad extends Model
{
    protected $guarded = [];

    public function cliente()
    {
    	return $this->belongsTo(Cliente::class);
    }

}
