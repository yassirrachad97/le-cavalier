<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horses extends Model
{
    protected $fillable = ['name', 'age', 'color','pidegrée','category_id'];

    public function annonces()
    {
        return $this->morphMany('App\Annonce', 'annonceable');
    }
}
