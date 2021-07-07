<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    use HasFactory;

    protected $fillable = [ 'product_id', 'title', 'image', 'price', 'price_retail', 'price_history', 'category', 'subcategory' ];
}
