<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
    use HasFactory;
    protected $fillable = ['montant','detail_id','mode_id'];
    public function detail()
    {
        return $this->belongsTo(Detail_bl::class, 'detail_id'); 
    }
    public function mode()
    {
        return $this->belongsTo(Mode::class, 'mode_id'); 
    }
}
