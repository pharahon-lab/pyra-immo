<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Uuid;

class FascadeImmo extends Model
{
    use HasFactory;
    use HasUuids;

    
    /**
     * Generate a new UUID for the model.
     */
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }
    
    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
    public function uniqueIds(): array
    {
        return ['id'];
    }
    
    public function proprio(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
    public function abonnements(): HasMany
    {
        return $this->hasMany(Abonnement::class);
    }
    public function latestAbonnement(): HasOne
    {
        return $this->hasOne(Abonnement::class, 'facade_id')->latestOfMany('created_at');
    }

    
    public function places(): HasMany
    {
        return $this->hasMany(Place::class, 'facade_id');
    }

    // get the places that are on free view
    public function freeViewPlaces(): HasMany
    {
        return $this->hasMany(Place::class, 'facade_id')->where('');
    }
    // get the places that are on free view
    public function countPlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->count();
    }
    public function countRentPlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->where('offer_type' , 'rent')->count();
    }
    public function countSellPlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->where('offer_type' , 'sell')->count();
    }
    public function countAppartementPlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->where('placeable_type' , Appartement::class)->count();
    }
    public function countBureauPlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->where('placeable_type' , Bureau::class)->count();
    }
    public function countChambrePlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->where('placeable_type' , Chambre::class)->count();
    }
    public function countCoworkingPlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->where('placeable_type' , Coworking::class)->count();
    }
    public function countEntrepotPlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->where('placeable_type' , Entrepot::class)->count();
    }
    public function countHotelPlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->where('placeable_type' , Hotel::class)->count();
    }
    public function countImmeublePlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->where('placeable_type' , Immeuble::class)->count();
    }
    public function countMagasinPlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->where('placeable_type' , Magasin::class)->count();
    }
    public function countResidencePlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->where('placeable_type' , Residence::class)->count();
    }
    public function countStudioPlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->where('placeable_type' , Studio::class)->count();
    }
    public function countTerrainPlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->where('placeable_type' , Terrain::class)->count();
    }
    public function countVillaPlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->where('placeable_type' , Villa::class)->count();
    }

    public function countLogement():int
    {
        return $this->countAppartementPlaces() + $this->countChambrePlaces() + $this->countHotelPlaces() + $this->countResidencePlaces() + $this->countStudioPlaces() + $this->countVillaPlaces();
    }
    public function countWork():int
    {
        return $this->countBureauPlaces() + $this->countCoworkingPlaces() + $this->countImmeublePlaces();
    }
    public function countComercial():int
    {
        return $this->countEntrepotPlaces() + $this->countMagasinPlaces();
    }
    

    public function countFreeViews(): int
    {
        return $this->hasManyThrough(FreeViews::class, Place::class, 'facade_id', 'place_id')->count();
    }
    public function countViews(): int
    {
        return $this->hasManyThrough(PlaceView::class, Place::class, 'facade_id', 'place_id')->count();
    }

    public function countVisites(): int
    {
        return $this->hasManyThrough(VisitesDone::class, Place::class, 'facade_id', 'place_id')->count();
    }

/// monthly
    
    public function countViewsMonth(): int
    {
        return $this->hasManyThrough(PlaceView::class, Place::class, 'facade_id', 'place_id')->whereMonth('place_views.created_at', '=', today()->subMonth()->month)->count();
    }

    public function countVisitesMonth(): int
    {
        return $this->hasManyThrough(VisitesDone::class, Place::class, 'facade_id', 'place_id')->whereMonth('visites_dones.created_at', '=', today()->subMonth()->month)->count();
    }

    
/// weekly
    
    public function countViewsWeek(): int
    {
        return $this->hasManyThrough(PlaceView::class, Place::class, 'facade_id', 'place_id')->whereMonth('place_views.created_at', '=', today()->subWeek()->week)->count();
    }

    public function countVisitesWeek(): int
    {
        return $this->hasManyThrough(VisitesDone::class, Place::class, 'facade_id', 'place_id')->whereMonth('visites_dones.created_at', '=', today()->subWeek()->week)->count();
    }

}
