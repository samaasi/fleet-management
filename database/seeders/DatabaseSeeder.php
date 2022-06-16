<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /** Seed the application's database. */
    public function run(): void
    {
        App::environment('local')
            ? static::development()
            : static::production();
    }

    protected function development(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class
        ], true);

        $this->call(UserSeeder::class);
    }

    protected function production(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            DefaultSingleSeeder::class,
        ], ['--no-interaction' => true]);
    }
}
