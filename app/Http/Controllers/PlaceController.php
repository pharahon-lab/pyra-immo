<?php

namespace App\Http\Controllers;

use App\Models\ImmoImages;
use App\Models\ImmoVideo;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    

    public function index(){
        return view('catalogue.places.index');
    }
    
    public function create(){
        return view('catalogue.places.create');
    }
    
    public function edit($house_id){
        $place = Place::findOrFail($house_id);
        return view('catalogue.places.edit', ['place' => $place]);
    }
    
    public function show($house_id){
        /// get the place object
        $place = Place::findOrFail($house_id);
        return view('catalogue.places.show', ['place' => $place]);
    }
    public function delete($house_id){
        $place = Place::firstOrFail($house_id);
        /// check if the user is the authorized to delete
        $place->deleteOrFail();
        return redirect('catalogue.places.index');
    }

    
    public function validateMaison($id)
    {
        $data = Place::findOrFail($id);
        $data->is_validated = 1;
        $data->save();
        return redirect()->back()->with('success','Maison validée avec succès');
    }

    public function makeOcccupe($id)
    {
        $data = Place::findOrFail($id);
        $data->is_occupe = 1;
        $data->save();
        return redirect()->back()->with('success','Le statut de la maison est désormais occupée');
    }

}
