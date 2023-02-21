<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles
        $role1 = Role::create([
            'name' => 'Super-Admin'
        ]);

        //Categories
        Permission::create([
            'name' => 'categories.index'
        ]);
        Permission::create([
            'name' => 'categories.create'
        ]);
        Permission::create([
            'name' => 'categories.show'
        ]);
        Permission::create([
            'name' => 'categories.edit'
        ]);
        Permission::create([
            'name' => 'categories.destroy'
        ]);

        //Clients
        Permission::create([
            'name' => 'clients.index'
        ]);
        Permission::create([
            'name' => 'clients.create'
        ]);
        Permission::create([
            'name' => 'clients.show'
        ]);
        Permission::create([
            'name' => 'clients.edit'
        ]);
        Permission::create([
            'name' => 'clients.destroy'
        ]);

        //Products
        Permission::create([
            'name' => 'products.index'
        ]);
        Permission::create([
            'name' => 'products.create'
        ]);
        Permission::create([
            'name' => 'products.show'
        ]);
        Permission::create([
            'name' => 'products.edit'
        ]);
        Permission::create([
            'name' => 'products.destroy'
        ]);
        Permission::create([
            'name' => 'products.change'
        ]);

        //Providers
        Permission::create([
            'name' => 'providers.index'
        ]);
        Permission::create([
            'name' => 'providers.create'
        ]);
        Permission::create([
            'name' => 'providers.show'
        ]);
        Permission::create([
            'name' => 'providers.edit'
        ]);
        Permission::create([
            'name' => 'providers.destroy'
        ]);

        //Purchases
        Permission::create([
            'name' => 'purchases.index'
        ]);
        Permission::create([
            'name' => 'purchases.create'
        ]);
        Permission::create([
            'name' => 'purchases.show'
        ]);
        Permission::create([
            'name' => 'purchases.pdf'
        ]);
        Permission::create([
            'name' => 'purchases.upload'
        ]);
        Permission::create([
            'name' => 'purchases.change'
        ]);

        //Sales
        Permission::create([
            'name' => 'sales.index'
        ]);
        Permission::create([
            'name' => 'sales.create'
        ]);
        Permission::create([
            'name' => 'sales.show'
        ]);
        Permission::create([
            'name' => 'sales.pdf'
        ]);
        Permission::create([
            'name' => 'sales.print'
        ]);
        Permission::create([
            'name' => 'sales.change'
        ]);

        //Reports
        Permission::create([
            'name' => 'reports.day'
        ]);
        Permission::create([
            'name' => 'reports.date'
        ]);
        Permission::create([
            'name' => 'reports.results'
        ]);

        //Businesses
        Permission::create([
            'name' => 'businesses.index'
        ]);
        Permission::create([
            'name' => 'businesses.update'
        ]);

        //Printers
        Permission::create([
            'name' => 'printers.index'
        ]);
        Permission::create([
            'name' => 'printers.update'
        ]);

        //Users
        Permission::create([
            'name' => 'users.index'
        ]);
        Permission::create([
            'name' => 'users.create'
        ]);
        Permission::create([
            'name' => 'users.show'
        ]);
        Permission::create([
            'name' => 'users.edit'
        ]);
        Permission::create([
            'name' => 'users.destroy'
        ]);

        //Roles
        Permission::create([
            'name' => 'roles.index'
        ]);
        Permission::create([
            'name' => 'roles.create'
        ]);
        Permission::create([
            'name' => 'roles.show'
        ]);
        Permission::create([
            'name' => 'roles.edit'
        ]);
        Permission::create([
            'name' => 'roles.destroy'
        ]);

        $role1->givePermissionTo(Permission::all());

//        //Categories
//        Permission::create([
//            'name' => 'categories.index'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'categories.create'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'categories.show'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'categories.edit'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'categories.destroy'
//        ])->syncRoles([$role1]);
//
//        //Clients
//        Permission::create([
//            'name' => 'clients.index'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'clients.create'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'clients.show'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'clients.edit'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'clients.destroy'
//        ])->syncRoles([$role1]);
//
//        //Products
//        Permission::create([
//            'name' => 'products.index'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'products.create'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'products.show'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'products.edit'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'products.destroy'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'products.change'
//        ])->syncRoles([$role1]);
//
//        //Providers
//        Permission::create([
//            'name' => 'providers.index'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'providers.create'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'providers.show'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'providers.edit'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'providers.destroy'
//        ])->syncRoles([$role1]);
//
//        //Purchases
//        Permission::create([
//            'name' => 'purchases.index'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'purchases.create'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'purchases.show'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'purchases.pdf'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'purchases.upload'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'purchases.change'
//        ])->syncRoles([$role1]);
//
//        //Sales
//        Permission::create([
//            'name' => 'sales.index'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'sales.create'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'sales.show'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'sales.pdf'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'sales.print'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'sales.change'
//        ])->syncRoles([$role1]);
//
//        //Reports
//        Permission::create([
//            'name' => 'reports.day'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'reports.date'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'reports.results'
//        ])->syncRoles([$role1]);
//
//        //Businesses
//        Permission::create([
//            'name' => 'businesses.index'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'businesses.update'
//        ])->syncRoles([$role1]);
//
//        //Printers
//        Permission::create([
//            'name' => 'printers.index'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'printers.update'
//        ])->syncRoles([$role1]);
//
//        //Users
//        Permission::create([
//            'name' => 'users.index'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'users.create'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'users.show'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'users.edit'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'users.destroy'
//        ])->syncRoles([$role1]);
//
//        //Roles
//        Permission::create([
//            'name' => 'roles.index'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'roles.create'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'roles.show'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'roles.edit'
//        ])->syncRoles([$role1]);
//        Permission::create([
//            'name' => 'roles.destroy'
//        ])->syncRoles([$role1]);
    }
}
