<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function sub_category(){
        return $this->hasOne(SubCategory::class);
    }
}
