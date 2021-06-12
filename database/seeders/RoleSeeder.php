<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->adminUser();
        $this->accountUser();
        $this->developerUser();
        $this->salesUser();
    }

    private function adminUser()
    {
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
    }

    private function accountUser()
    {
        $role = Role::create(['name' => 'Accounts']);
        $permissionsNames = [
            'account-type-access',
            'account-type-list',
            'account-type-create',
            'account-type-edit',
            'account-type-delete',

            'account-subtype-access',
            'account-subtype-list',
            'account-subtype-create',
            'account-subtype-edit',
            'account-subtype-delete',

            'coa-access',
            'coa-list',
            'coa-create',
            'coa-edit',
            'coa-delete',

            'journal-access',
            'journal-list',
            'journal-create',
            'journal-edit',
            'journal-delete',

            'project-access',
            'project-list',
            'project-create',
            'project-edit',
            'project-delete',

            'sub-project-access',
            'sub-project-list',
            'sub-project-create',
            'sub-project-edit',
            'sub-project-delete',

            'purchase-offer-access',
            'purchase-offer-list',
            'purchase-offer-create',
            'purchase-offer-edit',
            'purchase-offer-delete',

            'requisition-access',
            'requisition-list',
            'requisition-create',
            'requisition-edit',
            'requisition-delete',

            'transaction-access',
            'transaction-list',
            'transaction-create',
            'transaction-edit',
            'transaction-delete',

            'holiday-access',
            'holiday-list',

            'employee-access',
            'employee-list',

        ];

        $permissions = Permission::whereIn('name', $permissionsNames)->get();

        $role->syncPermissions($permissions);
    }

    private function developerUser()
    {
        $role = Role::create(['name' => 'Developer']);
        $permissionsNames = [


            'project-access',
            'project-list',

            'sub-project-access',
            'sub-project-list',


            'requisition-access',
            'requisition-list',
            'requisition-create',
            'requisition-edit',
            'requisition-delete',


            'holiday-access',
            'holiday-list',

            'employee-access',
            'employee-list',

        ];

        $permissions = Permission::whereIn('name', $permissionsNames)->get();

        $role->syncPermissions($permissions);
    }

    private function salesUser()
    {
        $role = Role::create(['name' => 'Sales']);
        $permissionsNames = [

            'requisition-access',
            'requisition-list',
            'requisition-create',
            'requisition-edit',
            'requisition-delete',


            'holiday-access',
            'holiday-list',

            'employee-access',
            'employee-list',

        ];

        $permissions = Permission::whereIn('name', $permissionsNames)->get();

        $role->syncPermissions($permissions);
    }
}
