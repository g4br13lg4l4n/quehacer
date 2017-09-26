<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publicidad;
class Cliente extends Model
{
    protected $guarded = [];

    public function publicidadades()
    {
        return $this->belongsTo(Publicidad::class);
    }
}
