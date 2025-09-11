<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Optional: Specify the table name if it's not 'products'
    // protected $table = 'products';

    // Fields that are mass assignable
    protected $fillable = [
        'title',
        'image',
        'likes',
    ];
}
