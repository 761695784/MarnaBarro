<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $fillable = [
        'image',
        'nom',
        'categorie',
        'adresse',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    
}
