<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publicidad;
class Cliente extends Model
{
    protected $guarded = [];

    public function publicidads()
    {
        return $this->hasMany(Publicidad::class);
    }

}
