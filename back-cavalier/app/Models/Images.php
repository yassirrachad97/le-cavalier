<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $fillable =[
    'id',
    'annonce_id',
    'url',
    ];


    public function annonce()
    {
        return $this->belongsTo(Annonces::class);
    }



}
