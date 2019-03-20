<?php

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

            'key-list',
            'key-create',
            'key-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'pdf-list',
            'pdf-create',
            'pdf-edit',
            'pdf-delete',

            'account-list',
            'account-edit'

        ];


        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);

        }
    }
}
