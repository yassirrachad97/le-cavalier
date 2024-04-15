<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use App\Models\Categories;
use App\Models\City;



class HomeController extends Controller
{
    public function index(){
        $annonces = Annonces::latest()->take(3)->get();
        $categories = Categories::all();
        $city = City::all();

        $data = [
            'annonces' => $annonces,
            'categories' => $categories,
            'cities' => $city,
        ];
        return view('frentOffice.home', $data);
    }


//     public function index()
//     {
//         $evenements = Evenement::where('approuved', 1)->latest()->paginate(3);
//         $categories = Categorie::all();
//         return view('frentOffice.home', compact('evenements','categories'));
//     }




//     public function showStatistics()
// {
//     $totalUsers = User::count();
//     $totalEvents = Evenement::count();

//     return view('backOffice.statistique', compact('totalUsers', 'totalEvents'));
// }

}
