<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Account\DriverLicense;
use App\Models\Automobile\VehicleLicense;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Account\ExpiringDriverLicensesNotification;
use App\Notifications\Automobile\ExpiringVehicleLicensesNotification;

class SendExpirationAlertsCommand extends Command
{
    protected $signature = 'fleet:expiring-alerts';

    protected $description = 'Check for expiring vehicle and driver licenses, and sends out an alert email.';

    public function handle(): void
    {
        // Get who to send to
        // Get Expiring interval (100 is just e.g)

        // Expiring vehicle licenses
        $vehicle_licenses = VehicleLicense::query()
            ->whereExpiring(100)
            ->with(['vehicle'])
            ->get();

        if ($vehicle_licenses->count() > 0) {
            Notification::send(
                'receipients',
                new ExpiringVehicleLicensesNotification($vehicle_licenses)
            );
        }

        // Expiring driver licenses
        $driver_licenses = DriverLicense::query()
            ->whereExpiring()
            ->with(['driver'])
            ->get();

        if ($driver_licenses->count() > 0) {
            Notification::send(
                'receipient',
                new ExpiringDriverLicensesNotification($driver_licenses)
            );
        }
    }
}
