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
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'account-type-list',
            'account-type-create',
            'account-type-edit',
            'account-type-delete',

            'account-subtype-list',
            'account-subtype-create',
            'account-subtype-edit',
            'account-subtype-delete',

            'leave-list',
            'leave-create',
            'leave-edit',
            'leave-delete',

            'coa-list',
            'coa-create',
            'coa-edit',
            'coa-delete',

            'employee-list',
            'employee-create',
            'employee-edit',
            'employee-delete',

            'inventory-list',
            'inventory-create',
            'inventory-edit',
            'inventory-delete',

            'inventory-item-list',
            'inventory-item-create',
            'inventory-item-edit',
            'inventory-item-delete',

            'item-list',
            'item-create',
            'item-edit',
            'item-delete',

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

        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
