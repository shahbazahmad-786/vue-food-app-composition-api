<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodMenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'src',
        'title',
        'details',
        'price'
    ];
}
