<?php

namespace App\Services;

use App\Livewire\Forms\ComoditiesForm;
use App\Livewire\Forms\ExteriorForm;
use App\Livewire\Forms\InteriorForm;
use App\Livewire\Forms\PlaceForm;
use App\Models\Appartement;
use App\Models\Comodities;
use App\Models\Exterior;
use App\Models\FreeViews;
use App\Models\Interior;
use App\Models\Place;
use App\Enum;
use App\Enum\PlaceTypeEnum;
use App\Models\Bureau;
use App\Models\Chambre;
use App\Models\Coworking;
use App\Models\Entrepot;
use App\Models\Hotel;
use App\Models\Immeuble;
use App\Models\Magasin;
use App\Models\Residence;
use App\Models\Studio;
use App\Models\Terrain;
use App\Models\User;
use App\Models\Villa;
use Illuminate\Support\Facades\Auth;

class PlaceService{
    
    /// create a new place
    public function new_place(PlaceForm $placeForm, InteriorForm $interiorForm, ExteriorForm $exteriorForm, ComoditiesForm $comoditiesForm, $place_type, $master_house_id, $master_house_type, $has_master_house = false, $is_free_view = false){
        /// if place has master get master object
        /// create placetype object
        /// affect master house to placetype
        $placetype = '';
        switch($place_type){
            case PlaceTypeEnum::APPARTEMENT->value :
                if ($has_master_house) {
                    $placetype = Appartement::create([
                        'appartementable_id'=> $master_house_id,
                        'appartementable_type'=> $master_house_type,
                    ]);
                } else {
                    $placetype = Appartement::create();
                }
                
                
                break;
            case PlaceTypeEnum::BUREAU->value :
                if ($has_master_house) {
                    $placetype = Bureau::create([
                        'bureauable_id'=> $master_house_id,
                        'bureauable_type'=> $master_house_type,
                    ]);
                } else {
                    $placetype = Bureau::create();
                }
                
                break;
            case PlaceTypeEnum::CHAMBRE->value :
                if ($has_master_house) {
                    $placetype = Chambre::create([
                        'chambreable_id'=> $master_house_id,
                        'chambreable_type'=> $master_house_type,
                    ]);
                } else {
                    $placetype = Chambre::create();
                }
                
                break;
            case PlaceTypeEnum::COWORKING->value :
                $placetype = Coworking::create();
                break;
            case PlaceTypeEnum::ENTREPOT->value :
                $placetype = Entrepot::create();
                break;
            case PlaceTypeEnum::HOTEL->value :
                $placetype = Hotel::create();
                break;
            case PlaceTypeEnum::IMMEUBLE->value :
                $placetype = Immeuble::create();
                break;
            case PlaceTypeEnum::MAGASIN->value :
                $placetype = Magasin::create();
                break;
            case PlaceTypeEnum::RESIDENCE->value :
                $placetype = Residence::create();
                break;
            case PlaceTypeEnum::STUDIO->value :
                if ($has_master_house) {
                    $placetype = Studio::create([
                        'studioable_id'=> $master_house_id,
                        'studioable_type'=> $master_house_type,
                    ]);
                } else {
                    $placetype = Studio::create();
                }
                break;
            case PlaceTypeEnum::TERRAIN->value :
                $placetype = Terrain::create();
                break;
            case PlaceTypeEnum::VILLA->value :
                $placetype = Villa::create();
                break;
        }
        ///affect placetype to placable in form
        /// create the place from form.
        $placeForm->placeable_id = $placetype->id;
        $placeForm->placeable_type = get_class($placetype);
        $user = User::find(Auth::id());
        $placeForm->facade_id = $user->fascadeImmo->id;
        $place = Place::create($placeForm->all());
        /// assigne the place as the interiorable and create the interior object
        $interiorForm->interiorsable_id = $placetype->id;
        $interiorForm->interiorsable_type = $placetype->id;
        $interior = Interior::create($interiorForm->all());
        /// assigne the place as the exteriorable and create the exterior object
        $exteriorForm->exteriorsable_id = $placetype->id;
        $exteriorForm->exteriorsable_type = $placetype->id;
        $exterior = Exterior::create($exteriorForm->all());
        /// assigne the place as the comoditaable and create the comodity object
        $comoditiesForm->comoditiesable_id = $placetype->id;
        $comoditiesForm->comoditiesable_type = $placetype->id;
        $comodities = Comodities::create($comoditiesForm->all());
        /// if the place is in free view, create the freeview link object and decrement the number of available freeview in the abonnement
        if ($is_free_view) {
            FreeViews::create([
                'place_id' => $place->id,
                'end_date' => date('Y-m-d', strtotime('+ 1 month', today()->toDate()->getTimestamp())),
            ]);
        }
        /// return the place
        return $place;
    }

    /// edit the place

    // delete place

    // place avilability

    /// place in freeview

    /// place unvalidated
}