<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        
        /////////user///////////////////
        // Create default permissions
        Permission::create(['name' => 'view categories']);

        //Permission::create(['name' => 'list comments']);
        Permission::create(['name' => 'view comments']);
        Permission::create(['name' => 'create comments']);
        Permission::create(['name' => 'update comments']);
        Permission::create(['name' => 'delete comments']);

        //Permission::create(['name' => 'list favrecipes']);
        Permission::create(['name' => 'view favrecipes']);
        Permission::create(['name' => 'create favrecipes']);
        Permission::create(['name' => 'update favrecipes']);
        Permission::create(['name' => 'delete favrecipes']);


        //Permission::create(['name' => 'list likes']);
        //Permission::create(['name' => 'view likes']);
        Permission::create(['name' => 'create likes']);
        Permission::create(['name' => 'update likes']);
        //Permission::create(['name' => 'delete likes']);

        //Permission::create(['name' => 'list rates']);
        Permission::create(['name' => 'view rates']);
        Permission::create(['name' => 'create rates']);
        //Permission::create(['name' => 'update rates']);
        //Permission::create(['name' => 'delete rates']);

        //Permission::create(['name' => 'list recipes']);
        Permission::create(['name' => 'view recipes']);
        //Permission::create(['name' => 'create recipes']);
        //Permission::create(['name' => 'update recipes']);
        //Permission::create(['name' => 'delete recipes']);

        //Permission::create(['name' => 'list reports']);
        //Permission::create(['name' => 'view reports']);
        Permission::create(['name' => 'create reports']);
        //Permission::create(['name' => 'update reports']);
        Permission::create(['name' => 'delete reports']);


        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        /////////////////////////chef//////////////////////
        // Create default permissions
        Permission::create(['name' => 'list categories']);
        Permission::create(['name' => 'view categories']);
        Permission::create(['name' => 'create categories']);
        //Permission::create(['name' => 'update categories']);
        //Permission::create(['name' => 'delete categories']);

        Permission::create(['name' => 'list comments']);
        Permission::create(['name' => 'view comments']);
        Permission::create(['name' => 'create comments']);
        Permission::create(['name' => 'update comments']);
        Permission::create(['name' => 'delete comments']);

        Permission::create(['name' => 'list favrecipes']);
        Permission::create(['name' => 'view favrecipes']);
        Permission::create(['name' => 'create favrecipes']);
        Permission::create(['name' => 'update favrecipes']);
        Permission::create(['name' => 'delete favrecipes']);

        Permission::create(['name' => 'list allingredients']);
        Permission::create(['name' => 'view allingredients']);
        Permission::create(['name' => 'create allingredients']);
        //Permission::create(['name' => 'update allingredients']);
        //Permission::create(['name' => 'delete allingredients']);

        Permission::create(['name' => 'list likes']);
        Permission::create(['name' => 'view likes']);
        Permission::create(['name' => 'create likes']);
        Permission::create(['name' => 'update likes']);
        Permission::create(['name' => 'delete likes']);

        Permission::create(['name' => 'list photos']);
        Permission::create(['name' => 'view photos']);
        Permission::create(['name' => 'create photos']);
        Permission::create(['name' => 'update photos']);
        Permission::create(['name' => 'delete photos']);

        Permission::create(['name' => 'list rates']);
        Permission::create(['name' => 'view rates']);
        Permission::create(['name' => 'create rates']);
        Permission::create(['name' => 'update rates']);
        Permission::create(['name' => 'delete rates']);

        Permission::create(['name' => 'list recipes']);
        Permission::create(['name' => 'view recipes']);
        Permission::create(['name' => 'create recipes']);
        Permission::create(['name' => 'update recipes']);
        Permission::create(['name' => 'delete recipes']);

        Permission::create(['name' => 'list allrecipeingredients']);
        Permission::create(['name' => 'view allrecipeingredients']);
        Permission::create(['name' => 'create allrecipeingredients']);
        Permission::create(['name' => 'update allrecipeingredients']);
        Permission::create(['name' => 'delete allrecipeingredients']);

        Permission::create(['name' => 'list reports']);
        Permission::create(['name' => 'view reports']);
        Permission::create(['name' => 'create reports']);
        Permission::create(['name' => 'update reports']);
        Permission::create(['name' => 'delete reports']);

        Permission::create(['name' => 'list steps']);
        Permission::create(['name' => 'view steps']);
        Permission::create(['name' => 'create steps']);
        Permission::create(['name' => 'update steps']);
        Permission::create(['name' => 'delete steps']);


        // Create chef role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'chef']);
        $userRole->givePermissionTo($currentPermissions);


        //////////////////////admin/////////////////
        // Create admin exclusive permissions
        Permission::create(['name' => 'list advertisements']);
        Permission::create(['name' => 'view advertisements']);
        Permission::create(['name' => 'create advertisements']);
        Permission::create(['name' => 'update advertisements']);
        Permission::create(['name' => 'delete advertisements']);


        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'list recipes']);
        Permission::create(['name' => 'view recipes']);
        Permission::create(['name' => 'create recipes']);
        Permission::create(['name' => 'update recipes']);
        Permission::create(['name' => 'delete recipes']);
        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('alimsallam@gmail.com')->first();

        if ($user->hasRole('admin')) {
            
        }
    }
}
