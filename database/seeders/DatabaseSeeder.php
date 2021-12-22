<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            RoleSeeder::class,
            CreateAdminUserSeeder::class,
            CreateAccountsUserSeeder::class,
            UserSeeder::class,
            AccountTypeSeeder::class,
            EmployeeTypeSeeder::class,
            HolidaySeeder::class,
            LeaveTypeSeeder::class,
            ProjectStatusSeeder::class,
        ]);
    }
}
