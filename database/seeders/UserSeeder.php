<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        $permissions = [
            'cadastrar',
            'editar',
            'visualizar',
            'deletar',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $funcionarioRole = Role::firstOrCreate(['name' => 'funcionario']);
        $estagiarioRole = Role::firstOrCreate(['name' => 'estagiario']);

        $adminRole->syncPermissions(Permission::all()); 

        $funcionarioRole->syncPermissions([
            'cadastrar',
            'editar',
            'visualizar',
        ]); 

        $estagiarioRole->syncPermissions([
            'cadastrar',
            'visualizar',
        ]); 

        $admin = User::firstOrCreate(
            ['name' => 'admin'],
            ['password' => Hash::make('123456')]
        );
        $admin->assignRole($adminRole);

        $funcionario = User::firstOrCreate(
            ['name' => 'funcionario'],
            ['password' => Hash::make('123456')]
        );
        $funcionario->assignRole($funcionarioRole);

        $estagiario = User::firstOrCreate(
            ['name' => 'estagiario'],
            ['password' => Hash::make('123456')]
        );
        $estagiario->assignRole($estagiarioRole);
    }
}
