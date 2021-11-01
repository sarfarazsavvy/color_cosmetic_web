<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

    protected $table = 'sales';
    protected $fillable = ['sales_date', 'store_id', 'product_id', 'user_id', 'quantity', 'status'];

    public function store()
    {
        return $this->hasMany(Store::class, 'id', 'store_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function store_stock()
    {
        return $this->hasMany(StoreStock::class, 'product_id', 'product_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }

}
