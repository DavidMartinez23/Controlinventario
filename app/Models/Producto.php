<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'stock',
        'precio',
    ];

    public function movimientos()
    {
        return $this->hasMany(MovimientoStock::class);
    }

    public function pedidosClientes()
    {
        return $this->belongsToMany(PedidoCliente::class, 'pedido_cliente_producto')
            ->withPivot('cantidad', 'precio_unitario')
            ->withTimestamps();
    }

    public function pedidosCompras()
    {
        return $this->belongsToMany(PedidoCompra::class, 'pedido_compra_producto')
            ->withPivot('cantidad', 'precio_unitario')
            ->withTimestamps();
    }
}
