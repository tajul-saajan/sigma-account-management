<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_types')->insert(['name' => 'Permanent']);
        DB::table('employee_types')->insert(['name' => 'Temporary']);
    }
}
