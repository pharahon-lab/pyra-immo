<?php
namespace App\Enum;

use App\Models\Appartement;
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
use App\Models\Villa;


enum PlaceTypeEnum:string
{
    case APPARTEMENT = Appartement::class;
    case BUREAU = Bureau::class;
    case CHAMBRE = Chambre::class;
    case COWORKING = Coworking::class;
    case ENTREPOT = Entrepot::class;
    case HOTEL = Hotel::class;
    case IMMEUBLE = Immeuble::class;
    case MAGASIN = Magasin::class;
    case RESIDENCE = Residence::class;
    case STUDIO = Studio::class;
    case TERRAIN = Terrain::class;
    case VILLA = Villa::class;
}
