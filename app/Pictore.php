<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publicidad;
class Pictore extends Model
{
    protected $guarded = [];

    public function publicidad()
    {
        return $this->belongTo(Publicidad::class);
    }
}
