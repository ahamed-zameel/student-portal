<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'quantity', 'batchcard_id', 'manufacture_date', 'expiry_date'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    
}
