<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'content',
        'photo',
        'user_id',

    ];
    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}
