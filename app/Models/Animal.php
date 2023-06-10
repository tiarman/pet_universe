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
        'sub_category_id',
        'pickup_point_id',
        'name',
        'slug',
        'description',
        'old_price',
        'selling_price',
        'discount_price',
        'stock',
        'qty',
        'image',
        'status',

    ];

    public static $statusArrays = ['active', 'inactive'];
}
