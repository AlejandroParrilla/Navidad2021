<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable = [
        'id',
        'igic',
        'nombre',
        'precio',
        'stock',
        'detalle',
        'image',
        'categoria_id',
    ];
    public function envio()
    {
        return $this->belongsTo(Envio::class);
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
