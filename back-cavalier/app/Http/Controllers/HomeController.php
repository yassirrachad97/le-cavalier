<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\User;
use App\Models\Evenement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        
        return view('frentOffice.home');
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
