<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function search(Request $request)
    {
        $title = $request->input('title');

        $annoncesQuery = Annonces::query()->where('title', 'like', '%' . $title . '%');


        $annonces = $annoncesQuery->get();

        return view('frentOffice.searchAnnonces', compact('annonces'));
    }
}
