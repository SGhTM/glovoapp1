<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['article','prix','photo','shop_id'];
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id'); 
    }
}
