<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use App\Http\Requests\UpdateAnnoncesRequest;
use App\Models\Accessoires;
use App\Models\Categories;
use App\Models\City;
use App\Models\Horses;
use App\Models\Images;
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



        $annonce = Annonces::paginate(12);
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
                //  'images.*' => 'image|mimes:jpeg,png,jpg,gif',
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
            // 'annonceable_type' => $annonceableType,
            'price' => $validatedData['price'],
            'approuved' => false,
        ]);
        $images = $request->file('images');

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
        return redirect()->back()->with('success', 'Annonce créée avec succès.');

    } catch (Exception $e) {
        // Redirection avec un message d'erreur
        return redirect()->back()->with('error', $e->getMessage());
    }
}







public function show(Annonces $annonce)
{
    $detail = null;
    $city = City::all();
    $categories = Categories::all();
    $data = [
        'annonce' => $annonce,
        'categories' => $categories,
        'cities' => $city,
    ];
    // dd($data['annonce']);


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

    // Passer les données à la vue
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


        return redirect()->back()->with('success', 'Annonce mise à jour avec succès.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Erreur lors de la mise à jour de l\'annonce : ' . $e->getMessage());
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        try {
            // Utilisez findOrFail pour obtenir l'annonce en fonction de certains critères de la requête
            $annonce = Annonces::findOrFail($id);
            // dd($annonce);

            // Utilisez la méthode destroy sur l'objet $annonce
            $annonce->delete();

            // Redirigez avec un message de succès
            return redirect()->back()->with('success', 'Annonce supprimée avec succès.');
        } catch (\Exception $e) {
            // En cas d'erreur, redirigez avec un message d'erreur
            return redirect()->back()->with('error', 'Erreur lors de la suppression de l\'annonce : ' . $e->getMessage());
        }
    }

}
