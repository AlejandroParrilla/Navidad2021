<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function envios()
    {
        return $this->hasMany(Envio::class);
    }
    public function edad(){
        $edad= \Carbon\Carbon::parse($this->fecha_nac)->age;
        return $edad;
    }
}
