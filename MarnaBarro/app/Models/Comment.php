<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'auteur',
        'contenu',
        'DatePublication',
        'bien_id',
    ];


  public function bien()
    {
        return $this->belongsTo(Bien::class);
    }




}
