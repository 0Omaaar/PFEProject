<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'chemin',
        'id_annonce'
    ];

    public function annonce(){
        return $this->belongsTo(Annonce::class);
    }
}
