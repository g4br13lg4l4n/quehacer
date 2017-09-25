<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
class Publicidad extends Model
{
    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }
}
