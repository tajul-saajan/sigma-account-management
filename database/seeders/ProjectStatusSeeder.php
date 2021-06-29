<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_status')->insert(['project_status' => 'PO Pending']);
        DB::table('project_status')->insert(['project_status' => 'PO Received']);
        DB::table('project_status')->insert(['project_status' => 'eBill Submitted']);
        DB::table('project_status')->insert(['project_status' => 'Hard Copy Submitted']);
        DB::table('project_status')->insert(['project_status' => 'Money Received']);
    }
}
