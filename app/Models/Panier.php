<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $fillable = ['date','heure','utilisateur_id','menu_id'];
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id'); 
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id'); 
    }
}
