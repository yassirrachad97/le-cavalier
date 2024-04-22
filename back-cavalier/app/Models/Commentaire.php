<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'content',
        'annonce_id',
        'user_id',
        ];


        public function annonce()
        {
            return $this->belongsTo(Annonces::class);
        }
        public function user()
        {
            return $this->belongsTo(User::class);
}
}
