<?php
namespace App\Enum;


enum PlaceRentPeriodEnum:string
{
    case Heure = 'hour';
    case Jour = 'day';
    case Semaine = 'week';
    case Mois = 'mounth';
    case Année = 'year';
}
