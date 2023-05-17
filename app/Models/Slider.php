<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $fillable = [
        'image',
        'title',
        'description',
        'btn_title',
        'btn_link',
        'status',
    ];

    public static $statusArray = ['active', 'inactive'];
}
