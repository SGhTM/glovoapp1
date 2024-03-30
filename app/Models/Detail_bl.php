<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_bl extends Model
{
    use HasFactory;
    protected $fillable = ['qte','panier_id','menu_id'];
    public function panier()
    {
        return $this->belongsTo(Panier::class, 'panier_id'); 
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id'); 
    }
}
