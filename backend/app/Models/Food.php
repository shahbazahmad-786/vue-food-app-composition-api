<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Food extends Model
{
    use HasFactory,HasApiTokens;

    protected $fillable = ['img', 'title', 'slug','food_id'];

    public function foodMenus() {
        return $this->hasMany(FoodMenue::class);

        
    }
}
