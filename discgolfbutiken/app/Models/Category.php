<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // name table 
    protected $table = "categorys";
    // what to store in table
    protected $fillable = [
        'category'

    ];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}