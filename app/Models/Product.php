<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','description',
    'discount','quantity','color_id','subcategory_id',
    'size_id','ratting'];

    public function subCategory(){
        return $this->hasOne(SubCategory::class);
    }

    public function productColor(){
        return $this->hasOne(ProductColor::class);
    }

    public function productSize(){
        return $this->hasOne(ProductSize::class);
    }

    public function productImage(){
        return $this->belongsTo(ProductImage::class);
    }
}
