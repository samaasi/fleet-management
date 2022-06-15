<?php

namespace App\Enums\Automobile;

use App\Enums\Traits\ExtendEnums;

enum VehicleBodyTypeEnum: string
{
    use ExtendEnums;

    case CABRIOLET = "Cabriolet";
    case COMERCIAL = "Comercial";
    case COUPE = "Coupé";
    case Crossover = "Crossover";
    case CROSSOVER_WAGON = "Crossover Wagon";
    case ESTATE = "Estate/Station Wagon";
    case FASTBACK = "Fastback";
    case HATCHBACK = "Hatchback";
    case LANDAULETTE = "Landaulette";
    case LIFTBACK = "Liftback";
    case LIMOUSINE = "Limousine";
    case MICROCAR = "Microcar";
    case MPV = "MPV";
    case PICK_UP = "Pickup";
    case ROADSTER = "Roadster";
    case SALOON = "Sedan/Saloon";
    case SUPERCAR = "Supercar";
    case SUV = "SUV";
    case SUV_TT = "SUV/TT";
    case TARGA = "Targa";
    case TARGA_TOP = "Targa top";
    case TRUCK = "Truck";
    case TT = "TT";
    case TURISMO = "Turismo";
    case VAN = "Van";
}
