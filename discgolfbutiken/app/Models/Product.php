<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Product extends Model
{
    use HasFactory;
    // name table 
    protected $table = "products";
    // what to store in table
    protected $fillable = [
        'name',
        'img',
        'price',
        'info',
        'stock',
        'category_id',
        'discount_id',
        'brand_id'

    ];

    // connect FKs
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id');
    }
}