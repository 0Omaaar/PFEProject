<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'id_marque'
    ];

    public function marque(){
        return $this->belongsTo(Marque::class);
    }

    public function voiture(){
        return $this->hasMany(Voiture::class);
    }
}
