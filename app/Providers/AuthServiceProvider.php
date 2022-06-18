<?php

namespace App\Providers;

use App\Models\IAM\Role;
use App\Models\Account\User;
use Laravel\Sanctum\Sanctum;
use App\Models\Account\Owner;
use App\Models\Account\Driver;
use App\Policies\IAM\RolePolicy;
use App\Models\Misc\Registration;
use App\Models\Automobile\Vehicle;
use App\Policies\Account\UserPolicy;
use App\Models\Account\OwnerAddress;
use App\Models\Account\DriverContact;
use App\Policies\Account\OwnerPolicy;
use App\Models\Account\DriverLicense;
use App\Models\KnowledgeBase\Question;
use App\Policies\Account\DriverPolicy;
use App\Models\IAM\PersonalAccessToken;
use App\Models\Account\DriverGuarantor;
use Illuminate\Validation\Rules\Password;
use App\Policies\Misc\RegistrationPolicy;
use App\Models\Automobile\VehicleHistory;
use App\Models\Automobile\VehicleLicense;
use App\Policies\Automobile\VehiclePolicy;
use App\Models\Account\DriverGuarantorMeta;
use App\Policies\Account\OwnerAddressPolicy;
use App\Models\Automobile\VehicleMaintenance;
use App\Policies\Account\DriverContactPolicy;
use App\Policies\Account\DriverLicensePolicy;
use App\Policies\KnowledgeBase\QuestionPolicy;
use App\Policies\Account\DriverGuarantorPolicy;
use App\Policies\Automobile\VehicleLicensePolicy;
use App\Policies\Automobile\VehicleHistoryPolicy;
use App\Policies\Account\DriverGuarantorMetaPolicy;
use App\Models\Automobile\VehicleMaintenanceService;
use App\Policies\Automobile\VehicleMaintenancePolicy;
use App\Policies\Automobile\VehicleMaintenanceServicePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Owner::class => OwnerPolicy::class,
        Driver::class => DriverPolicy::class,
        Vehicle::class => VehiclePolicy::class,
        Question::class => QuestionPolicy::class,
        OwnerAddress::class => OwnerAddressPolicy::class,
        Registration::class => RegistrationPolicy::class,
        DriverContact::class => DriverContactPolicy::class,
        DriverLicense::class => DriverLicensePolicy::class,
        VehicleHistory::class => VehicleHistoryPolicy::class,
        VehicleLicense::class => VehicleLicensePolicy::class,
        DriverGuarantor::class => DriverGuarantorPolicy::class,
        DriverGuarantorMeta::class => DriverGuarantorMetaPolicy::class,
        VehicleMaintenance::class => VehicleMaintenancePolicy::class,
        VehicleMaintenanceService::class => VehicleMaintenanceServicePolicy::class,
        Role::class => RolePolicy::class,
    ];

    /** Register any authentication / authorization services. */
    public function boot(): void
    {
        $this->registerPolicies();

        Password::defaults(function (){
            return Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised();
        });

        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
