<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publicidad;
use App\UserAplication;
class PublicidadInterest extends Model
{
    protected $guarded = [];

    public function publicidads() 
    {
        return $this->HasMany(Publicidad::class);
    }

    public function userAplications()
    {
        return $this->HasMany(UserAplication::class);
    }
}
