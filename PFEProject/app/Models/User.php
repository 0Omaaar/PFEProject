<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'ville',
        'type',
        'email',
        'password',
    ];

    public function annonce()
    {
        return $this->hasMany(Annonce::class);
    }

    public function commentaire()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function favorites()
    {
        // return $this->belongsToMany(Annonce::class, 'favorites', 'user_id', 'annonce_id')->withTimestamps();
        return $this->hasMany(Favorite::class);
    }

    public function vues()
    {
        return $this->belongsToMany(Annonce::class, 'vues', 'user_id', 'annonce_id')->withTimestamps();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->type === 'admin';
    }
}