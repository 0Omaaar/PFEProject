<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($marque) {
            $marque->modele()->delete();
        });
    }
    protected $fillable = [
        'nom',
        'logo'
    ];

    public function modele(){
        return $this->hasMany(Modele::class);
    }

    public function voiture(){
        return $this->hasMany(Voiture::class);
    }
}
