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
            'status',
            'categorie', 
            'addresse',
            'image',
          'date_publier',
  ];
 
}
