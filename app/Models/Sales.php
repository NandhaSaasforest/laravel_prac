<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = ['category_id', 'product_name', 'amount'] ;

    public function category(){
        return $this->belongsTo(category::class);
    }
}
