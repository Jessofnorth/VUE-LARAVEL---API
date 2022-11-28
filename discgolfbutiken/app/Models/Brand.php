<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    // name table 
    protected $table = "brands";
    // what to store in table
    protected $fillable = [
        'brand_name',
        'brand_phone',
        'brand_contact',
        'brand_email'

    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}