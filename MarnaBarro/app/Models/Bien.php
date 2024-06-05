<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{

    use HasFactory;

  protected $fillable =
  [
             'nom',
            'description',
            'statut',
            'categorie', 
            'adresse',
            'image',
          'DatePubli',
  ];
 

  public function comments()
  {
      return $this->hasMany(Comment::class);
  }


}
