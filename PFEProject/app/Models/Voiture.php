<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = [
        'annee',
        'carburant',
        'transmission',
        'kilometrage',
        'puissance_fiscale',
        'dedouanee',
        'premiere_main',
        'type',
        'modele_id',
        'marque_id' 
    ];

    public function modele(){
        return $this->belongsTo(Modele::class);
    }

    public function marque(){
        return $this->belongsTo(Marque::class);
    }

    public function annonce(){
        return $this->hasMany(Annonce::class);
    }
}
