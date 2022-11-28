<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    // name table 
    protected $table = "discounts";
    // what to store in table
    protected $fillable = [
        'discount'
    ];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}