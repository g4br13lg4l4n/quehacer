<?php

namespace App;
use App\Publicidad;
use Illuminate\Database\Eloquent\Model;

class UserAplication extends Model
{
    protected $guarded = [];

    public function publicidads()
    {
        return $this->belongsToMany(Publicidad::class, 'publicidad_interests');
    }
}
