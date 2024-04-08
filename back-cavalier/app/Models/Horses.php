<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horses extends Model
{
    use HasFactory;
    protected $fillable =
    ['horse_name',
     'horse_age',
      'horse_color',
      'horse_pedigree'
      ];

    public function annonces()
    {
        return $this->morphOne(Annonces::class, 'annonceable');
    }
    
}
