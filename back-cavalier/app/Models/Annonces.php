<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonces extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'phone_appel',
        'phone_wathsapp',
        'user_id',
        'cover',
        'horse_id',
        'accessoire_id',
        'city_id',
        'category_id',
        'price',
        'approuved',

    ];

    public function horse()
    {
        return $this->belongsTo(Horses::class);
    }

    public function accessoire()
    {
        return $this->belongsTo(Accessoires::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function images()
    {
        return $this->hasMany(Images::class);
    }
    public function categorie(){
        return $this->belongsTo(Categories::class);
    }


}
