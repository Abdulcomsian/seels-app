<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'publish']);
        Permission::create(['name' => 'unpublish']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo([Permission::all()]);

        $role = Role::create(['name' => 'notary']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'customer']);
        $role->givePermissionTo(Permission::all());

        $user1 = new User;
        $user1->first_name = 'Admin';
        $user1->last_name = 'admin';
        $user1->email = 'admin@gmail.com';
        $user1->company_name = 'Company1';
        $user1->phone = '1231231231';
        $user1->password = Hash::make('admin1234');
        $user1->email_verified_at = now();
        $user1->save();
        $user1->assignRole('admin');

        $user2 = new User;
        $user2->first_name = 'Customer';
        $user2->last_name = 'customer';
        $user2->email = 'customer@gmail.com';
        $user2->password = Hash::make('test123');
        $user2->company_name = 'Company2';
        $user2->phone = '3213213213';
        $user2->email_verified_at = now();
        $user2->save();
        $user2->assignRole('customer');
    }
}
