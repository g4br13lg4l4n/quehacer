<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publicidad;
use App\Categoria;
class Cliente extends Model
{
    protected $guarded = ['created_at', 'updated_at'];

    public function publicidads()
    {
        return $this->hasMany(Publicidad::class);
    }

    public function categorias () {
        return $this->hasMany(Categoria::class);
    }

}
