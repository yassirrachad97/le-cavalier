<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function search(Request $request)
    {
        $title = $request->input('title');
        $category = $request->input('category');

        $annoncesQuery = Annonces::query()->where('title', 'like', '%' . $title . '%');

        if ($category && $category !== 'all') {
            $annoncesQuery->whereHas('category', function ($query) use ($category) {
                $query->where('id', $category);
            });
        }

        $annonces = $annoncesQuery->get();

        return view('frentOffice.searchAnnonces', compact('annonces'));
    }

}
