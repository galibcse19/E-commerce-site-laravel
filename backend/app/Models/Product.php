<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Ensures Laravel uses the correct table
    protected $fillable = ['title', 'image', 'price', 'category'];
}
