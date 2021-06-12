<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()

    {

        $permissions = [
            'role-access',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

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

            'leave-access',
            'leave-list',
            'leave-create',
            'leave-edit',
            'leave-delete',

            'coa-access',
            'coa-list',
            'coa-create',
            'coa-edit',
            'coa-delete',

            'employee-access',
            'employee-list',
            'employee-create',
            'employee-edit',
            'employee-delete',

            'inventory-access',
            'inventory-list',
            'inventory-create',
            'inventory-edit',
            'inventory-delete',

            'inventory-item-access',
            'inventory-item-list',
            'inventory-item-create',
            'inventory-item-edit',
            'inventory-item-delete',

            'item-access',
            'item-list',
            'item-create',
            'item-edit',
            'item-delete',

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
            'holiday-create',
            'holiday-edit',
            'holiday-delete',


        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
