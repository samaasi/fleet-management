<?php

namespace Database\Seeders;

use App\Models\IAM\Permission;
use App\Models\IAM\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    use WithoutModelEvents;

    public static string $DEFAULT_ROLE = "Administrator";

    public function run(): void
    {
        $this->command->line('<fg=blue>Resetting cached roles...</>');
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $this->command->line('<fg=green>Done resetting cached roles.</>');

        $this->command->line('<fg=blue>Seeding roles and assigning permissions...</>');
        Role::query()->updateOrCreate([
            'name' => static::$DEFAULT_ROLE
        ])->givePermissionTo(Permission::all());
        $this->command->line('<fg=green>Done.</>');
    }
}
