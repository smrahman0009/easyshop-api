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
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }

    public function productColor(){
        return $this->belongsTo(ProductColor::class,'color_id');
    }

    public function productSize(){
        return $this->belongsTo(ProductSize::class,'size_id');
    }

    public function productImage(){
        return $this->hasOne(ProductImage::class);
    }
}
