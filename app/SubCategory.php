<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function parent_category_id() {
        return $this->belongsTo(Cateogry::class);
    }
}
