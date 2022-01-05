<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
