<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    
    protected $fillable = ['image_1','image_2','image_3','product_id'];

    public function product(){
        return $this->hasOne(Product::class);
    }
}
