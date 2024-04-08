<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessoires extends Model
{
    use HasFactory;
    protected $fillable =
    ['accessoire_type',
     'accessoire_name'
     ];

    public function annonces()
    {
        return $this->morphOne(Annonces::class, 'annonceable');
    }
   
}
