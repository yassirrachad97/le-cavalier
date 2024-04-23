<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnoncesRequest;
use App\Models\Annonces;
use App\Http\Requests\UpdateAnnoncesRequest;
use App\Models\Accessoires;
use App\Models\Categories;
use App\Models\City;
use App\Models\Commentaire;
use App\Models\Horses;
use App\Models\Images;
use Exception;
use Illuminate\Support\Facades\Auth;

class AnnoncesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        $annonce = Annonces::where('approuved', 1)->latest()->paginate(12);
        $categories = Categories::all();
        $city = City::all();

        $data = [
            'Annonces' => $annonce,
            'categories' => $categories,
            'cities' => $city,
        ];
        return view('frentOffice.pageAnnonce', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dashIndex()
    {
        $user = Auth::user();
        $annonces = Annonces::where('user_id', $user->id)->get();
        $categories = Categories::all();
        $city = City::all();
        $data = [
            'Annonces' => $annonces,
            'categories' => $categories,
            'cities' => $city,
        ];
        return view('backOffice.annonces', compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     */



     public function store(StoreAnnoncesRequest $request)
     {
         try {
            $validatedData = $request->validated();

             if ($request->hasFile('cover')) {
                 $cover = $request->file('cover')->store('covers', 'public');
             } else {
                 $cover = null;
             }




        $annonceableType = null;
        $annonceableId = null;
        $horseId = null;
        $accessoireId = null;


        if ($request->filled(['horse_name', 'horse_age', 'horse_color'])) {
            $horseData = $request->only(['horse_name', 'horse_age', 'horse_color']);
            $horseData['horse_pedigree'] = $request->has('horse_pedigree');

            $horse = Horses::create($horseData);
            $annonceableType = Horses::class;
            $annonceableId = $horse->id;
        }
         elseif ($request->filled(['accessoire_type', 'accessoire_name'])) {


            $accessoire = Accessoires::create($request->only(['accessoire_type', 'accessoire_name']));
            $annonceableType = Accessoires::class;
            $annonceableId = $accessoire->id;
        }
        if ($annonceableType === Horses::class) {
            $horseId = $annonceableId;
        } else {
            $accessoireId = $annonceableId;
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
            'horse_id' => $horseId,
            'accessoire_id' => $accessoireId,
            'price' => $validatedData['price'],
            'approuved' => false,
        ]);
        $images = $request->file('images');
        $user_id = auth()->id();

        if ($images) {
            foreach ($images as $image) {

                $path = $image->store('images', 'public');
               $id = $annonce->id;
                $image = new Images();
                $image->url = $path;
                $image->Annonce_id = $id;
                $image->save();

            }

        }
    } catch (Exception $e) {
        logger()->error($e->getMessage());
        if (auth()->id() === null) {
            return redirect()->back()->withErrors("Erreur lors de la création de l'annonce. Veuillez vous connecter.");
        }
        return redirect()->back()->withErrors("Erreur lors de la création de lannonce");
    }

    return redirect()->back()->withSuccess('Annonce créée avec succès.');


     }



public function show(Annonces $annonce)
{

    $detail = null;
    $city = City::all();
    $categories = Categories::all();
    $commentaires = Commentaire::with('user')->where('annonce_id',$annonce->id)->paginate(5);
    $data = [
        'annonce' => $annonce,
        'categories' => $categories,
        'cities' => $city,
        'commentaires' => $commentaires,
    ];



    if ($annonce->horse_id) {

        $detail = [
            'type' => 'cheval',
            'details' => $annonce->horse
        ];
    } elseif ($annonce->accessoire_id) {

        $detail = [
            'type' => 'accessoire',
            'details' => $annonce->accessoire
        ];

    }


    return view('frentOffice.details', compact('data', 'detail'));
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonces $annonces)
    {
        $categories = Categories::all();
        $cities = City::all();

        return view('backOffice.updateAnnonceModal', compact('annonces', 'categories', 'cities'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnoncesRequest $request, $id)
{

    try {
        $annonces = Annonces::findOrFail($id);


        $annonces->update([
            'title' => $request->title,
            'description' => $request->description,
            'phone_appel' => $request->phone_appel,
            'phone_wathsapp' => $request->phone_wathsapp,
            'city_id' => $request->city_id,
            'category_id' => $request->category_id,
            'price' => $request->price,
        ]);


        if (isset($request->horse_name) && isset($request->horse_age) && isset($request->horse_color)) {
            $annonces->horse()->update([
                'horse_name' => $request->horse_name,
                'horse_age' => $request->horse_age,
                'horse_color' => $request->horse_color,
                'horse_pedigree' => $request->has('horse_pedigree') ? true : false,
            ]);
        }

        if (isset($request->accessoire_type) && isset($request->accessoire_name)) {
            $annonces->accessoire()->update([
                'accessoire_type' => $request->accessoire_type,
                'accessoire_name' => $request->accessoire_name,
            ]);
        }


        return redirect()->back()->withSuccess('success', 'Annonce mise à jour avec succès.');
    } catch (\Exception $e) {
        logger()->error($e->getMessage());
        return redirect()->back()->withSuccess('error', 'Erreur lors de la mise à jour de l\'annonce : ' );
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $annonce = Annonces::findOrFail($id);
            // dd($annonce);


            $annonce->delete();


            return redirect()->back()->withSuccess('Annonce supprimée avec succès.');
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            return redirect()->back()->withErrors( 'Erreur lors de la suppression de l\'annonce : ');
        }
    }

    public function approve(Annonces $annonce)
    {
        $annonce = Annonces::findOrFail($annonce->id);

        $annonce->update(['approuved' => true]);

        return redirect()->back()->withSuccess('Annonce approuvé avec succès.');
    }

    public function apprveAnnonces()
{
        $annoncesNonApprouves = Annonces::where('approuved', false)->get();


    return view('backOffice.approuve', compact('annoncesNonApprouves'));
}


}
