<?php

namespace App\Http\Controllers;


use App\Models\Categories;
use App\Models\Evenement;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return view('backOffice.categorie', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Categories::create($request->all());

        return redirect()->back()->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categorie)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $categorie-> name = $request->input("name");
       $categorie->update();


        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categorie)
    {
        $categorie->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}

