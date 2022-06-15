<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DriverGuarantor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected const DRIVER_GUARANTOR_PASSPORT_MEDIA_COLLECTION = 'driver-guarantor-passport';
    protected const DRIVER_GUARANTOR_DOCUMENT_MEDIA_COLLECTION = 'driver-guarantor-documents';

    protected $casts = [
        'verified' => 'boolean',
    ];
}
