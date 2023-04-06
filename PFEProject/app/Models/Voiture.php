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
    ];
}
