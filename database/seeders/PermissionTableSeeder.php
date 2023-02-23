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
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'categoty-list',
            'categoty-create',
            'categoty-edit',
            'categoty-delete',
            'subCategoty-list',
            'subCategoty-create',
            'subCategoty-edit',
            'subCategoty-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete'


        ];



        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

    }

}
