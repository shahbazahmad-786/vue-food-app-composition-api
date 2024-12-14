<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Make sure to include full_name and other fields here
    protected $fillable = [
        'food_menue_id',
        'user_id',
        'quantity',
        'total_price',
        'full_name',
        'contact',
        'email',
        'address',
    ];

    public function foodMenue()
    {
        return $this->belongsTo(FoodMenue::class, 'food_menue_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
