<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'Admin']);
        $adminPermissions = ['manage', 'view', 'create', 'edit', 'delete'];
        foreach ($adminPermissions as $ap) {
            $permission = Permission::create(['name' => $ap]);
            $adminRole->givePermissionTo($permission);
        }
        $adminUser = User::create([
            'name' => 'Admin',
            'username' => 'admin123',
            'password' => Hash::make('1234'),
            'avatar' => 'avatar-1.png'
        ]);
        $adminUser->assignRole($adminRole);

        $rohisRole = Role::create(['name' => 'Rohis']);
        $rohisPermissions = ['manage-rohis'];
        foreach ($rohisPermissions as $ap) {
            $permission = Permission::create(['name' => $ap]);
            $rohisRole->givePermissionTo($ap);
        }
        $rohisUser = User::create([
            'name' => 'Rohis',
            'username' => 'rohis123',
            'password' => Hash::make('1234'),
            'avatar' => 'avatar-1.png'
        ]);
        $rohisUser->assignRole($rohisRole);

        $silatRole = Role::create(['name' => 'Silat']);
        $silatPermissions = ['manage-silat'];
        foreach ($silatPermissions as $ap) {
            $permission = Permission::create(['name' => $ap]);
            $silatRole->givePermissionTo($ap);
        }
        $silatUser = User::create([
            'name' => 'Silat',
            'username' => 'silat123',
            'password' => Hash::make('1234'),
            'avatar' => 'avatar-1.png'
        ]);
        $silatUser->assignRole($silatRole);

        $marchingRole = Role::create(['name' => 'Marching']);
        $marchingPermissions = ['manage-marching'];
        foreach ($marchingPermissions as $ap) {
            $permission = Permission::create(['name' => $ap]);
            $marchingRole->givePermissionTo($ap);
        }
        $marchingUser = User::create([
            'name' => 'Marching',
            'username' => 'marching123',
            'password' => Hash::make('1234'),
            'avatar' => 'avatar-1.png'
        ]);
        $marchingUser->assignRole($marchingRole);

        $futsalRole = Role::create(['name' => 'Futsal']);
        $futsalPermissions = ['manage-futsal'];
        foreach ($futsalPermissions as $ap) {
            $permission = Permission::create(['name' => $ap]);
            $futsalRole->givePermissionTo($ap);
        }
        $futsalUser = User::create([
            'name' => 'futsal',
            'username' => 'futsal123',
            'password' => Hash::make('1234'),
            'avatar' => 'avatar-1.png'
        ]);
        $futsalUser->assignRole($futsalRole);

        $pmrRole = Role::create(['name' => 'Pmr']);
        $pmrPermissions = ['manage-pmr'];
        foreach ($pmrPermissions as $ap) {
            $permission = Permission::create(['name' => $ap]);
            $pmrRole->givePermissionTo($ap);
        }
        $pmrUser = User::create([
            'name' => 'pmr',
            'username' => 'pmr123',
            'password' => Hash::make('1234'),
            'avatar' => 'avatar-1.png'
        ]);
        $pmrUser->assignRole($pmrRole);

        $vollyRole = Role::create(['name' => 'Volly']);
        $vollyPermissions = ['manage-volly'];
        foreach ($vollyPermissions as $ap) {
            $permission = Permission::create(['name' => $ap]);
            $vollyRole->givePermissionTo($ap);
        }
        $vollyUser = User::create([
            'name' => 'volly',
            'username' => 'volly123',
            'password' => Hash::make('1234'),
            'avatar' => 'avatar-1.png'
        ]);
        $vollyUser->assignRole($vollyRole);

        $pramukaRole = Role::create(['name' => 'Pramuka']);
        $pramukaPermissions = ['manage-pramuka'];
        foreach ($pramukaPermissions as $ap) {
            $permission = Permission::create(['name' => $ap]);
            $pramukaRole->givePermissionTo($ap);
        }
        $pramukaUser = User::create([
            'name' => 'pramuka',
            'username' => 'pramuka123',
            'password' => Hash::make('1234'),
            'avatar' => 'avatar-1.png'
        ]);
        $pramukaUser->assignRole($pramukaRole);

        $paskibraRole = Role::create(['name' => 'Paskibra']);
        $paskibraPermissions = ['manage-paskibra'];
        foreach ($paskibraPermissions as $ap) {
            $permission = Permission::create(['name' => $ap]);
            $paskibraRole->givePermissionTo($ap);
        }
        $paskibraUser = User::create([
            'name' => 'paskibra',
            'username' => 'paskibra123',
            'password' => Hash::make('1234'),
            'avatar' => 'avatar-1.png'
        ]);
        $paskibraUser->assignRole($paskibraRole);

        $basketRole = Role::create(['name' => 'Basket']);
        $basketPermissions = ['manage-basket'];
        foreach ($basketPermissions as $ap) {
            $permission = Permission::create(['name' => $ap]);
            $basketRole->givePermissionTo($ap);
        }
        $basketUser = User::create([
            'name' => 'basket',
            'username' => 'basket123',
            'password' => Hash::make('1234'),
            'avatar' => 'avatar-1.png'
        ]);
        $basketUser->assignRole($basketRole);

        $seniRole = Role::create(['name' => 'Seni']);
        $seniPermissions = ['manage-seni'];
        foreach ($seniPermissions as $ap) {
            $permission = Permission::create(['name' => $ap]);
            $seniRole->givePermissionTo($ap);
        }
        $seniUser = User::create([
            'name' => 'seni',
            'username' => 'seni123',
            'password' => Hash::make('1234'),
            'avatar' => 'avatar-1.png'
        ]);
        $seniUser->assignRole($seniRole);
    }
}
