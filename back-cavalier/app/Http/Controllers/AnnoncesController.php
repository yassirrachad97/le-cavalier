<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use App\Http\Requests\StoreAnnoncesRequest;
use App\Http\Requests\UpdateAnnoncesRequest;
use App\Models\Accessoires;
use App\Models\Categories;
use App\Models\City;
use App\Models\Horses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnoncesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        $annonce = Annonces::all();
        $categories = Categories::all();
        $city = City::all();

        $data = [
            'Annonces' => $annonce,
            'categories' => $categories,
            'cities' => $city,
        ];
        return view('frentOffice.home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */




     public function store(Request $request)
     {
         try {
             $validatedData = $request->validate([
                 'title' => 'required|string',
                 'description' => 'required|string',
                 'phone_appel' => 'required|string',
                 'phone_wathsapp' => 'nullable|string',
                 'cover' => 'required|file',
                 'city_id' => 'required|exists:cities,id',
                 'price' => 'required|numeric|min:0',
                 'horse_id' => 'nullable|exists:horses,id',
                 'accessoire_id' => 'nullable|exists:accessoires,id',
                 'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                 'horse_name' => 'nullable|string',
                 'horse_age' => 'nullable|numeric',
                 'horse_color' => 'nullable|string',
                 'horse_pedigree' => 'nullable|string',
                 'category_id' => 'required|exists:categories,id',
                 'accessoire_type' => 'nullable|string',
                 'accessoire_name' => 'nullable|string',
             ]);

             if ($request->hasFile('cover')) {
                 $cover = $request->file('cover')->store('covers', 'public');
             } else {
                 $cover = null;
             }

             $annonce = Annonces::create([
                 'title' => $validatedData['title'],
                 'description' => $validatedData['description'],
                 'phone_appel' => $validatedData['phone_appel'],
                 'phone_wathsapp' => $validatedData['phone_wathsapp'],
                 'user_id' => auth()->id(),

                 'cover' => $cover,
                 'city_id' => $validatedData['city_id'],
                 'category_id' => $validatedData['category_id'],
                 'horse_id' => $validatedData['horse_id'],

                 'accessoire_id' => $validatedData['accessoire_id'],
                 'price' => $validatedData['price'],
                 'approuved' => 0,
             ]);

             if ($annonce) {
                 if ($request->has('horse_id')) {
                     $element = Horses::create($request->only(['horse_name', 'horse_age', 'horse_color', 'horse_pedigree']));
                 } elseif ($request->has('accessoire_id')) {
                     $element = Accessoires::create($request->only(['accessoire_type', 'accessoire_name']));
                 }

                 if (isset($element)) {
                     $annonce->annonceable()->associate($element);
                     $annonce->save();

                     return redirect()->back()->with('success', 'Annonce créée avec succès.');
                 } else {
                     throw new Exception("Échec de la création de l'élément associé.");
                 }
             } else {
                 throw new Exception("Échec de la création de l'annonce.");
             }
         } catch (Exception $e) {
             return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
         }
     }













    public function show(Annonces $annonces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonces $annonces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnoncesRequest $request, Annonces $annonces)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonces $annonces)
    {
        //
    }
}
