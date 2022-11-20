<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['order_quantity', 'total_price', 'products_id', 'checkout_id'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
}
