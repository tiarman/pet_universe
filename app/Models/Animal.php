<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $table = 'animals';
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'pickup_point_id',
        'name',
        'slug',
        'description',
        'purchase_price',
        'selling_price',
        'discount_price',
        'stock_quantity',
        'image',
        'status',

    ];

    public static $statusArrays = ['active', 'inactive'];
}
