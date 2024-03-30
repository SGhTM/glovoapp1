<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;
    protected $fillable = ['nom_cat','photo'];
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
