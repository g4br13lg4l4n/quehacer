<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
use App\Categoria;
use App\Picture;
use App\PublicidadInterest;
use App\UserAplication;
use App\Publicidad;
class Publicidad extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function cliente()
    {
    	return $this->belongsTo(Cliente::class);
    }

    public function categoria() 
    {
        return $this->belongsTo(Categoria::class);
    }

    public function pictures() 
    {
        return $this->hasMany(Picture::class);
    }

    public function userAplications()
    {
        return $this->belongsToMany(UserAplication::class, 'publicidad_interests');
    }

}
