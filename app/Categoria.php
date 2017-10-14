<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publicidad;
class Categoria extends Model
{
    protected $guarded = ['created_at', 'updated_at'];
    
    public function publicidads()
    {
        return $this->hasMany(Publicidad::class);
    }
}
