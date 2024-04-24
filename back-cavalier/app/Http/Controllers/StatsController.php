<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function showStats()
    {
     
        $usersCount = User::count();


        $categoriesCount = Categories::count();

        $annoncesCount = Annonces::count();

        return view('backOffice.statistiqueAdmin', [
            'usersCount' => $usersCount,
            'categoriesCount' => $categoriesCount,
            'annoncesCount' => $annoncesCount,
        ]);
    }
}
