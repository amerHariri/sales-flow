<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'stock', 'is_active'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
