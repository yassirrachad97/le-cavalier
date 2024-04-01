<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonces extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'description',
        'phone_appel',
        'phone_wathsapp',
        'user_id',
        'annonceable_id',
        'annonceable_type',
        'city_id',
        'price',
        'approuved',

    ];

    public function annonceable()
    {
        return $this->morphTo();
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


}
