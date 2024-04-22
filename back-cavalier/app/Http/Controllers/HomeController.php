<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use App\Models\Categories;
use App\Models\City;



class HomeController extends Controller
{
    public function index()
    {
        $annonces_horse = Annonces::latest()->whereNotNull('horse_id')->take(4)->get();
        $annonces_accessoire = Annonces::latest()->whereNotNull('accessoire_id')->take(4)->get();
        $categories = Categories::all();
        $city = City::all();

        $data = [
            'annonces_horse' => $annonces_horse,
            'annonces_accessoire' => $annonces_accessoire,
            'categories' => $categories,
            'cities' => $city,
        ];

        return view('frentOffice.home', compact('data'));
    }






}
