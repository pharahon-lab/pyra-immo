<?php
namespace App\Enum;

enum PlaceOfferTypeEnum:string
{
    case Occune = 'none';
    case Vente = 'sell';
    case Location = 'rent';
}

