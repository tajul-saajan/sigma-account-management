<?php

namespace Database\Seeders;

use App\Models\AccountType;
use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccountType::create([
            'type'=>'Asset',
            'description'=>'Any Asset',
            'classification'=>'BalanceSheet',
        ]);

        AccountType::create([
            'type'=>'Liability',
            'description'=>'Any Liability',
            'classification'=>'BalanceSheet',
        ]);

        AccountType::create([
            'type'=>'Revenue',
            'description'=>'Any Revenue',
            'classification'=>'Profit & Loss',
        ]);

        AccountType::create([
            'type'=>'Expense',
            'description'=>'Any Expense',
            'classification'=>'Profit & Loss',
        ]);

        AccountType::create([
            'type'=>'Equity',
            'description'=>'Any Equity',
            'classification'=>'BalanceSheet',
        ]);
    }
}
