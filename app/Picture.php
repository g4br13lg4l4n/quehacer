<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publicidad;
class Picture extends Model
{
    protected $guarded = [];
    public function publicidad()
    {
        return $this->belongTo(Publicidad::class);
    }
}
