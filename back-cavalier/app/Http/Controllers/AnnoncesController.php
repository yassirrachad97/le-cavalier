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
        $this->setAnnonceableAttributes($annonce, $validatedData);
        $this->addImagesToAnnonce($annonce, $request);

        $annonce->save();

        return redirect()->route('annonces.index')->with('success', 'Annonce ajoutée avec succès.');
    }

    private function setAnnonceableAttributes($annonce, $validatedData)
    {
        if ($validatedData['annonceable_type'] == 'horse') {
            $horse = Horses::find($validatedData['annonceable_id']);
            $annonce->annonceable()->associate($horse);
            $annonce->name = $horse->name;
            $annonce->age = $horse->age;
            $annonce->color = $horse->color;
            $annonce->pidegrée = $horse->pidegrée;
            $annonce->category_id = $horse->category_id;
        } elseif ($validatedData['annonceable_type'] == 'accessoire') {
            $accessoire = Accessoires::find($validatedData['annonceable_id']);
            $annonce->annonceable()->associate($accessoire);
            $annonce->type = $accessoire->type;
            $annonce->name = $accessoire->name;
            $annonce->category_id = $accessoire->category_id;
        }
    }

    private function addImagesToAnnonce($annonce, $request)
    {
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $path = $image->store('images');
                $annonce->images()->create(['url' => $path]);
            }
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
