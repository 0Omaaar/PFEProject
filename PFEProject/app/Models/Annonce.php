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
        'miniature',
        'etat',
        'user_id',
        'voiture_id'
    ];

    public function voiture(){
        return $this->belongsTo(Voiture::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function image(){
        return $this->hasMany(Image::class);
    }
}
