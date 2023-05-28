<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class Annonce extends Model
{
    use HasFactory;
    use HasApiTokens;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'titre',
        'description',
        'prix',
        'miniature',
        'etat',
        'vendu',
        'user_id',
        'voiture_id',
    ];

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function commentaire()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function favorites()
    {
        // return $this->belongsToMany(User::class, 'favorites', 'annonce_id', 'user_id')->withTimestamps();
        return $this->hasMany(Favorite::class);
    }

    public function vues()
    {
        return $this->hasMany(Vue::class);
    }
    
    public function isActive()
    {
        return $this->etat == 1;
    }
}
