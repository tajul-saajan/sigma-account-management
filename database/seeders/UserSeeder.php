<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->admin();
        $this->accounts();
        $this->developer();
        $this->sales();
    }

    private function admin()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@demo.com',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole(1);
    }

    private function accounts()
    {
        $user = User::create([
            'name' => 'Accounts',
            'email' => 'accounts@demo.com',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole(2);
    }

    private function developer()
    {
        $user = User::create([
            'name' => 'Developer',
            'email' => 'developer@demo.com',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole(3);
    }

    private function sales()
    {
        $user = User::create([
            'name' => 'Sales',
            'email' => 'sales@demo.com',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole(4);
    }
}
