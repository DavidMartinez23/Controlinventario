<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoCliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'fecha',
        'total',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_cliente_producto')
                    ->withPivot('cantidad', 'precio_unitario')
                    ->withTimestamps();
    }

    protected static function boot()
    {
        parent::boot();
    
        static::deleting(function ($pedido) {
            foreach ($pedido->productos as $producto) {
                $producto->increment('stock', $producto->pivot->cantidad);
                // Registrar movimiento de stock
                MovimientoStock::create([
                    'producto_id' => $producto->id,
                    'tipo' => 'entrada',
                    'cantidad' => $producto->pivot->cantidad,
                    'motivo' => 'Pedido cliente eliminado'
                ]);
            }
        });
    }
}
