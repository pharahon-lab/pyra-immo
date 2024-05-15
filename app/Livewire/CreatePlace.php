<?php

namespace App\Livewire;

use App\Enum\PlaceOfferTypeEnum;
use App\Enum\PlaceTypeEnum;
use App\Livewire\Forms\ComoditiesForm;
use App\Livewire\Forms\ExteriorForm;
use App\Livewire\Forms\InteriorForm;
use App\Livewire\Forms\PlaceForm;
use App\Models\Appartement;
use App\Models\Chambre;
use App\Models\Coworking;
use App\Models\Entrepot;
use App\Models\Hotel;
use App\Models\Immeuble;
use App\Models\ImmoImages;
use App\Models\ImmoVideo;
use App\Models\Magasin;
use App\Models\Place;
use App\Models\Residence;
use App\Models\Studio;
use App\Models\Terrain;
use App\Models\User;
use App\Models\Villa;
use App\Services\PlaceService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
class CreatePlace extends Component
{

    use WithFileUploads;
    
    public ?PlaceForm $placeForm; 
    public ?InteriorForm $interiorForm; 
    public ?ExteriorForm $exteriorForm; 
    public ?ComoditiesForm $comoditiesForm; 

    #[Validate(['photos.*' => 'image|max:16384, extensions:jpg,png,webp,gif,jpeg'])]
    public array $photos = [];
    public $photoSelectedIndex = 0;

    #[Validate(['videos.*' => 'mimetypes:video/avi,video/mp4, extensions:avi,mp4'])]
    public array $videos = [];
    public $videoSelectedIndex = 0;

    public $placeTypes;
    public $place_type ;
    public $is_free_view = false ;
    public $is_image_selected = true ;

    public $placeOfferTypes;
    public $placeOffer ;
    public $not_living = [Terrain::class, Entrepot::class, Magasin::class];
    public $etage_nb_t = [Hotel::class, Immeuble::class, Magasin::class, Residence::class, Villa::class];
    public $divisable = [Hotel::class, Immeuble::class, Residence::class];
    public $chambrable = [Chambre::class, Studio::class, Appartement::class];
    public $conf = [Coworking::class, Hotel::class, Residence::class, Immeuble::class];


    public function mount()
    {
        $this->place_type = Appartement::class;
        $fas = User::find(Auth::id())->fascadeImmo;
        $ab = $fas->latestAbonnement->abonnement_type;
        for ($i=0; $i < $ab->max_image; $i++) { 
            $this->photos[$i] = null;
        }
        for ($i=0; $i < $ab->max_video; $i++) { 
            $this->videos[$i] = null;
        }
    }

    public function selectPhoto($index){
        $this->photoSelectedIndex = (int) $index;
        $this->is_image_selected = true ;
    }

    public function selectVideo($index){
        $this->videoSelectedIndex =  (int) $index;
        $this->is_image_selected = false ;
    }

    public function savePictures(Place $place){

        foreach ($this->photos as $key=>$photo) {
            if($photo != ''){
                $photo1 =  TemporaryUploadedFile::createFromBase($photo) ;
                $imageName = Auth::id().'img'.time().'.'.Storage::mimeType($photo);
                $uploadedPath =$photo1->storeAs('house/photos', $imageName, 's3');
                $img = ImmoImages::create([
                    'url' => $uploadedPath,
                    'place_id' => $place->id,
                ]);
                if($key = 0){
                    $place->photo_couverture = $uploadedPath;
                }

            }
        }
        
    }

    public function saveVideos(Place $place){

        foreach ($this->videos as $key=>$video) {
            if($video != ''){
                $video1 =  TemporaryUploadedFile::createFromBase($video) ;
                $imageName = Auth::id().'img'.time().'.'.Storage::mimeType($video);
                $uploadedPath =$video1->storeAs('house/photos', $imageName, 's3');
                $vid = ImmoVideo::create([
                    'url' => $uploadedPath,
                    'place_id' => $place->id,
                ]);

            }
        }
        
    }

    public function save(PlaceService $placeServices){

        $place = $placeServices->new_place( 
            placeForm: $this->placeForm,
            interiorForm: $this->interiorForm,
            exteriorForm: $this->exteriorForm,
            comoditiesForm: $this->comoditiesForm,
            place_type: $this->place_type,
            master_house_id: null,
            master_house_type: null,
            has_master_house: false,
            is_free_view: false
        );

        $this->savePictures($place);
        $this->saveVideos($place);
        

        return redirect()->route('catalogue.places.index');
    }


    public function render()
    {
        return view('livewire.create-place');
    }

}
