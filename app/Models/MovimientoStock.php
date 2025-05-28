<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovimientoStock extends Model
{
    use HasFactory;

    protected $table = 'movimientos_stock'; // Añade esta línea

    protected $fillable = [
        'producto_id', 'tipo', 'cantidad', 'motivo'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}