<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'prix',
        'date_creation',
        'miniature',
        'etat',
    ];

    public function voiture(){
        return $this->belongsTo(Voiture::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
