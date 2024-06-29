<?php

namespace App\Http\Controllers;

use App\Enum\PlaceOfferTypeEnum;
use App\Enum\PlaceRentPeriodEnum;
use App\Enum\PlaceTypeEnum;
use App\Http\Resources\CommunesResource;
use App\Http\Resources\PlaceResource;
use App\Models\Communes;
use App\Models\Country;
use App\Models\Place;
use App\Services\PlaceService;
use Illuminate\Http\Request;
use IntlIterator;

class PlaceApiController extends Controller
{
    
    public function getAllCommunes()
    {
        $communes = Communes::all();
        return CommunesResource::collection($communes);
    }
    
    public function getAllEnums()
    {
        $pote = [];
        $prpe = [];
        $pte = [];
        
        foreach (PlaceOfferTypeEnum::cases() as $key => $en) {
            $pote[$en->name] = $en->value;
        }
        foreach (PlaceRentPeriodEnum::cases() as $key => $en) {
            $prpe[$en->name] = $en->value;
        }
        foreach (PlaceTypeEnum::cases() as $key => $en) {
            $pte[$en->name] = $en->value;
        }
        $data['offer_types'] = $pote;
        $data['rent_types' ]= $prpe;
        $data['place_types'] = $pte;
        return response()->json($data);
    }
    
    public function getAllCountries()
    {
        $contries = Country::all();
        return response()->json($contries);
    }
    

    
    public function searchBureau(Request $request)
    {
        $datas = Place::where('commune_id',$request->commune_id)
            ->where('is_validated',1)
            ->where('is_occupe',0)
            //->where('is_Bureau',1)
            //->where('is_rejected',0)
            ->orWhere(function ($query) use ($request) {
                $query->orWhere('nombre_piece','>=',$request->nombre_piece)
                    ->orWhere('nombre_salle_eau','>=',$request->nombre_salle_eau)
                    ->orWhere('is_Appartment', $request->is_Appartment)
                    ->orWhere('is_MAISON_BASSE', $request->is_MAISON_BASSE)
                    ->orWhere('is_Studio', $request->is_Studio)
                    ->orWhere('is_Chambre', $request->is_Chambre)
                    ->orWhere('is_Residence', $request->is_Residence)
                    ->orWhere('is_DUPLEX', $request->is_DUPLEX)
                    ->orWhere('is_HAUT_STANDING', $request->is_HAUT_STANDING)
                    ->orWhere('has_PISCINE', $request->has_PISCINE)
                    ->orWhere('has_GARDIEN', $request->has_GARDIEN)
                    ->orWhere('has_GARAGE', $request->has_GARAGE)
                    ->orWhere('has_balcon_avant', $request->has_balcon_avant)
                    ->orWhere('has_balcon_arriere', $request->has_balcon_arriere)
                ->orWhere('has_COUR_AVANT',$request->has_COUR_AVANT)
                    ->orWhere('has_COUR_ARRIERE',$request->has_COUR_ARRIERE);
            })->inRandomOrder()
            ->limit(200)
            ->get();
        return response()->json($datas);
    }

    public function addPlace(Request $request, PlaceService $placeServices)
    {
        
        // $request_images = $request->images;
        // $request_videos = $request->videos;
        // $im = [];
        // $vi = [];
        $request_place= $request->place;
        $request_interieur = $request->interieur;
        $request_exterieur = $request->exterieur;
        $request_commoditees = $request->commoditees;

        $place = $placeServices->new_api_place( 
            user: $request->user(),
            placeForm: $request_place,
            interiorForm: $request_interieur,
            exteriorForm: $request_exterieur,
            comoditiesForm: $request_commoditees,
            place_type: $request_place['place_type'],
            master_house_id: $request_place['parent_id'],
            master_house_type: null,
            has_master_house: $request_place['has_parent'],
            is_free_view: false
        );

        // foreach ($request_images as $pictu) {
        //     array_push($im, base64_decode($pictu));
        // }

        // foreach ($request_videos as $vide) {
        //     array_push($vi, base64_decode($vide));
        // }

        // $placeServices->savePictures($place, $im);
        // $placeServices->saveVideos($place, $vi);
        // $place->refresh();

        return PlaceResource::make($place);
    }

    public function showPlace($id)
    {
        $data = Place::findOrFail($id);
        return response()->json($data);
    }

    public function updatePlace(Request $request, $id)
    {
        $data = Place::findOrFail($id);
        $data->latitude=$request->latitude;
        $data->longitude=$request->longitude;
        $data->price=$request->price;
        $data->proprio_name=$request->proprio_name;
        $data->proprio_telephone=$request->proprio_telephone;
        $data->demarcheur_id=$request->demarcheur_id;
        $data->description=$request->description;
        $data->is_Studio=$request->is_Studio;
        $data->is_Chambre=$request->is_Chambre;
        $data->is_Appartment=$request->is_Appartment;
        $data->is_Bureau=$request->is_Bureau;
        $data->is_MAISON_BASSE=$request->is_MAISON_BASSE;
        $data->is_DUPLEX=$request->is_DUPLEX;
        $data->has_PISCINE=$request->has_PISCINE;
        $data->is_HAUT_STANDING=$request->is_HAUT_STANDING;
        $data->has_COUR_AVANT=$request->has_COUR_AVANT;
        $data->has_COUR_ARRIERE=$request->has_COUR_ARRIERE;
        $data->has_GARDIEN=$request->has_GARDIEN;
        $data->has_GARAGE=$request->has_GARAGE;
        $data->has_balcon_avant=$request->has_balcon_avant;
        $data->has_balcon_arriere=$request->has_balcon_arriere;
        $data->nombre_piece=$request->nombre_piece;
        $data->nombre_salle_eau=$request->nombre_salle_eau;
        $data->is_validated=$request->is_validated;
        $data->is_occupe=$request->is_occupe;
        $data->commune_id=$request->commune_id;
        $data->updated_at = now();
        $data->save();
        return response()->json($data);
    }

    public function deletePlace(Request $request, $id)
    {
        $data = Place::where('id',$id)->delete();
        if($data)
        {
            return 'Suppression ok';
        }
        else
        {
            return 'Une erreur est survenue';
        }

    }

    public function getMyPlaces(Request $request)
    {
        $user = $request->user();
        return response()->json(PlaceResource::collection($user->fascadeImmo->places));
    }

    public function getAllplaces()
    {
        $places = Place::all();
        return response()->json($places);
    }

    public function getCategoryPlaces($category)
    {
        $pt = PlaceTypeEnum::cases();
        
        $keys = array_map(fn($case) => $case->name, $pt); 
        if (in_array($category, $keys)) {
            $plt = array_filter($pt, function ($case) use ($category) {
                return $case->name === $category;
            });
            $places = Place::where('placeable_type', $plt[array_key_first($plt)])->limit(5)->get();
            return response()->json(PlaceResource::collection($places));
        }else{
            return response()->json(["errors" => ['Category' => 'Category inconnue ']], 401);
        }
        // $places = Place::where('placeable_type', PlaceTypeEnum::APPARTEMENT->value)->get();
        // return response()->json(PlaceResource::collection($places));
    }
}
