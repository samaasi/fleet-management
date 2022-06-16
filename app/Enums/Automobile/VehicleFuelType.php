<?php

namespace App\Enums\Automobile;

use App\Enums\Traits\ExtendEnums;

enum VehicleFuelType: string
{
    use ExtendEnums;

    case DIESEL = "Diesel";
    case E85 = "E85";
    case ELECTRIC = "Electric";
    case HYBRID_DIESEL = "Hybrid / Diesel";
    case HYBRID_PETROL = "Hybrid / Petrol";
    case LPG_CNG = "LPG or CNG";
    case PETROL = "Petrol";
    case PETROL_CNG = "Petrol or CNG";
    case PETROL_ETHANOL = "Petrol or Ethanol";
    case PETROL_LPG = "Petrol or LPG";
}
