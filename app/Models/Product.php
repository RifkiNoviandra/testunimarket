<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gallery',
        'price',
        'description',
        'category_id',
        'user_id',
        'flag_banner',
        'flag_flash'
    ];

    public $timestamps = false;

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
