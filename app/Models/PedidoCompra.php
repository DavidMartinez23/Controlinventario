<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoCompra extends Model
{
    use HasFactory;

    protected $fillable = [
        'proveedor_id',
        'fecha',
        'total',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function productos()
    {
        return $this->belongsToMany(\App\Models\Producto::class, 'pedido_compra_producto')
            ->withPivot('cantidad', 'precio_unitario')
            ->withTimestamps();
    }
}
