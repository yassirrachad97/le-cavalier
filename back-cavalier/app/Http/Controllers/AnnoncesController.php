<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use App\Http\Requests\StoreAnnoncesRequest;
use App\Http\Requests\UpdateAnnoncesRequest;
use App\Models\Accessoires;
use App\Models\Categories;
use App\Models\City;
use App\Models\Horses;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class AnnoncesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();

        $annonce = Annonces::where('organisateur_id',$user->id)->get();
        $categories = Categories::all();
        $city = City::all();

        $data = [
            'Annonces' => $annonce,
            'categories' => $categories,
            'city' => $city,
        ];
        return view('annonces.index', compact('data'));
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

        $validatedData = $request->validate([
            'description' => 'required|string',
            'phone_appel' => 'required|string',
            'phone_wathsapp' => 'nullable|string',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'city_id' => 'required|exists:cities,id',
            'price' => 'required|numeric|min:0',
            'annonceable_type' => 'required|string|in:horse,accessoire',
            'annonceable_id' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $annonce = Annonces::create([
            'description' => $validatedData['description'],
            'phone_appel' => $validatedData['phone_appel'],
            'phone_wathsapp' => $validatedData['phone_wathsapp'],
            'user_id' => auth()->id(),
            'cover' => $validatedData['cover']->store('covers', 'public'),
            'city_id' => $validatedData['city_id'],
            'price' => $validatedData['price'],
            'approuved' => 0,
        ]);


    if ($validatedData['annonceable_type'] === 'horse') {
        $horse = Horses::create([
            'name' => $validatedData['horse_name'],
            'age' => $validatedData['horse_age'],
            'color' => $validatedData['horse_color'],
            'pedigree' => $validatedData['horse_pedigree'],
            'category_id' => $validatedData['category_id'],
        ]);

        $annonce->annonceable()->associate($horse);
    } elseif ($validatedData['annonceable_type'] === 'accessoire') {
        $accessoire = Accessoires::create([
            'type' => $validatedData['accessoire_type'],
            'name' => $validatedData['accessoire_name'],
            'category_id' => $validatedData['category_id'],
        ]);

        $annonce->annonceable()->associate($accessoire);
    }
        $annonce->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images');
                $annonce->images()->create(['url' => $path]);
            }
        }

        return redirect()->route('annonces.index')->with('success', 'Annonce ajoutée avec succès.');
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
