<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAccountsUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Accounts User',
            'email' => 'accounts@user.com',
            'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'Accounts']);
        $permissionsNames = [
            'account-type-list',
            'account-type-create',
            'account-type-edit',
            'account-type-delete',

            'account-subtype-list',
            'account-subtype-create',
            'account-subtype-edit',
            'account-subtype-delete',

            'coa-list',
            'coa-create',
            'coa-edit',
            'coa-delete',

            'journal-list',
            'journal-create',
            'journal-edit',
            'journal-delete',

            'project-list',
            'project-create',
            'project-edit',
            'project-delete',

            'sub-project-list',
            'sub-project-create',
            'sub-project-edit',
            'sub-project-delete',

            'purchase-offer-list',
            'purchase-offer-create',
            'purchase-offer-edit',
            'purchase-offer-delete',

            'requisition-list',
            'requisition-create',
            'requisition-edit',
            'requisition-delete',

            'transaction-list',
            'transaction-create',
            'transaction-edit',
            'transaction-delete',

            'employee-list'

        ];

        $permissions = Permission::whereIn('name', $permissionsNames)->get();

        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
