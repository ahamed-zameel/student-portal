<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['product_id', 'sold_quantity', 'sale_date'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
