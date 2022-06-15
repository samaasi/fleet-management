<?php

namespace App\Models\Builders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class VehicleLicenseQueryBuilder extends Builder
{
    public function whereExpiring(int $days = 60): self
    {
        return $this->whereNotNull('expiration_date')
            ->whereNull('deleted_at')
            ->whereRaw(DB::raw('DATE_SUB(`expiration_date`,INTERVAL ' . $days . ' DAY) <= DATE(NOW()) '))
            ->where('expiration_date', '>', date('Y-m-d'))
            ->orderBy('expiration_date', 'ASC');
    }
}
