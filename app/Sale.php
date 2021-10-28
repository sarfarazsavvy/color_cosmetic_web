<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function store() {
        return $this->hasMany(Store::class, 'id', 'store_id');
    }

    public function product() {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
