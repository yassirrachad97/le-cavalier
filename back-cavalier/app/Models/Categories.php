<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',

    ];
    public function annonces()
    {
        return $this->hasMany(Annonces::class, 'category_id'); 
    }
}
