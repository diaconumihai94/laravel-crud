<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    use hasFactory;
    
    public $fillable = [
        'product_name',
        'product_description',
        'product_status',
        'product_price',
        'product_code'
    ];

    protected $table='product_stock';
}
