<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'commentaire_id',
        'user_id'
    ];

    public function commentaire()
    {
        return $this->belongsTo(Commentaire::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
