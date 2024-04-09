<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessoires extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'id',
    'accessoire_type',
     'accessoire_name'
     ];

     public function annonce()
     {
         return $this->belongsTo(Annonces::class);
     }

}
