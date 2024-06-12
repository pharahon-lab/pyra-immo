<?php

namespace App\Http\Controllers;

use App\Enum\PlaceOfferTypeEnum;
use App\Enum\PlaceRentPeriodEnum;
use App\Enum\PlaceTypeEnum;
use App\Http\Resources\CommunesResource;
use App\Models\Communes;
use App\Models\Country;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceApiController extends Controller
{
    
    public function getAllCommunes()
    {
        $communes = Communes::all();
        return CommunesResource::collection($communes);
    }
    
    public function getAllEnums()
    {
        $data['offer_types'] = PlaceOfferTypeEnum::cases();
        $data['rent_types' ]= PlaceRentPeriodEnum::cases();
        $data['place_types'] = PlaceTypeEnum::cases();
        return response()->json($data);
    }
    
    public function getAllCountries()
    {
        $contries = Country::all();
        return response()->json($contries);
    }

    public function getAllplaces()
    {
        $places = Place::all();
        return response()->json($places);
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

    public function addPlace(Request $request)
    {
        //on compte le nb d'enregistrement existant
        $count = Place::count('id');
        $data = Place::create(
            [
                'latitude'=>$request->latitude,
                'longitude'=>$request->longitude,
                'price'=>$request->price,
                'proprio_name'=>$request->proprio_name,
                'proprio_telephone'=>$request->proprio_telephone,
                'user_id'=>$request->user_id,
                'description'=>$request->description,
                'created_at'=>now(),
                'is_Studio'=>$request->is_Studio,
                'is_Chambre'=>$request->is_Chambre,
                'is_occupe'=>$request->is_occupe,
                'is_Residence'=>$request->is_Residence,
                'is_Appartment'=>$request->is_Appartment,
                'is_Bureau'=>$request->is_Bureau,
                'is_MAISON_BASSE'=>$request->is_MAISON_BASSE,
                'is_DUPLEX'=>$request->is_DUPLEX,
                'has_PISCINE'=>$request->has_PISCINE,
                'is_HAUT_STANDING'=>$request->is_HAUT_STANDING,
                'has_COUR_AVANT'=>$request->has_COUR_AVANT,
                'has_COUR_ARRIERE'=>$request->has_COUR_ARRIERE,
                'has_GARDIEN'=>$request->has_GARDIEN,
                'has_GARAGE'=>$request->has_GARAGE,
                'has_balcon_avant'=>$request->has_balcon_avant,
                'has_balcon_arriere'=>$request->has_balcon_arriere,
                'nombre_piece'=>$request->nombre_piece,
                'nombre_salle_eau'=>$request->nombre_salle_eau,
                'is_validated'=>$request->is_validated,
                'commune_id'=>$request->commune_id,
                'image_id'=>$count+1,
                'ref'=>uniqid()

            ]
        );
        //on enregistre dans la table image la photo
        //traitement image
        /*$arrImg = [];
        $array_image = [];
        for ($i=0; $i<=9; $i++)
        {
            $image=$request->picture;
            $image.$i = $request->picture.$i;
        // $arrImg = [];
        // $array_image = [];
        // for ($i=0; $i<=9; $i++)
        // {
        //     $image=$request->picture;
        //     $image.$i = $request->picture.$i;

        //     if($image.$i!=null)
        //     {
        //         $imageName=$image.$i;
        //         $image.$i = $this->savePicture($imageName, ('assets/img/places/'.rand(1,9999999999999999).'.jpg'));
        //     }
        //     else
        //     {
        //         $imageName=null;
        //         $image.$i=null;
        //     }

        //     $array_image = array_push($arrImg,$image.$i);
        // }

        Image::create(
            [
                'place_id'=>$data->image_id,
                'url'=>$array_image,
                'created_at'=>now(),
            ]
        );*/
        // Image::create(
        //     [
        //         'place_id'=>$data->image_id,
        //         'url'=>$array_image,
        //         'created_at'=>now(),
        //     ]
        // );

        return response()->json($data);
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

    public function getMyPlaces(Request $request, $id)
    {
        $a = Place::with('image')->where('user_id', '=',$id)->withCount('passvisites')->get();
        return response()->json($a);
        }

}
