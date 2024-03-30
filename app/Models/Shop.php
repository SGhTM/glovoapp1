<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable =  ['nom_shop','photo','catalogue_id'];

    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class, 'catalogue_id'); 
    }
    
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
