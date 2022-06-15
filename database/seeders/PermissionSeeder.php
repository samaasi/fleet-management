<?php

namespace Database\Seeders;

use App\Models\IAM\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    use WithoutModelEvents;

    /** Run the database seeds. */
    public function run(): void
    {
        $this->command->line("<fg=blue>Resetting cached permissions...</>");
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $this->command->line('<fg=green>Done resetting cached permissions.</>');

        $this->command->line("<fg=blue>Seeding permissions...</>");
        collect(config('iam'))
            ->each(function ($permission) {
                Permission::query()
                    ->updateOrCreate([
                        'name' => $permission
                    ]
                );
            }
        );
        $this->command->line('<fg=green>Done seeding permissions.</>');
    }
}
