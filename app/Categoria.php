<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publicidad;
class Categoria extends Model
{
    public function publicidads()
    {
        return $this->hasMany(Publicidad::class);
    }
}
