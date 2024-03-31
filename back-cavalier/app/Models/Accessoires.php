<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessoires extends Model
{
    protected $fillable = ['type', 'name', 'category_id'];

    public function annonces()
    {
        return $this->morphMany('App\Annonce', 'annonceable');
    }
}
