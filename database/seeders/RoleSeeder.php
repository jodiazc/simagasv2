<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrador = Role::create(['name' => 'Administrador']);
        $operador = Role::create(['name' => 'Operador']);
        $lecturista = Role::create(['name' => 'Lecturistas']);


        Permission::create(['name' => 'admin.users.index','description' => 'Ver LIstado de usuarios'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.users.edit','description' => 'Asignar un rol'])->syncRoles([$administrador]);
        //Permission::create(['name' => 'admin.users.create'])->syncRoles([$administrador]);        
        //Permission::create(['name' => 'admin.users.update'])->syncRoles([$administrador]);

        Permission::create(['name' => 'admin.home','description' => 'Ver Dashboard'])->syncRoles([$administrador,$operador,$lecturista]);
        Permission::create(['name' => 'admin.payments.index','description' => 'Ligas de pago'])->syncRoles([$administrador,$operador,$lecturista]);
        Permission::create(['name' => 'admin.payments.create','description' => 'Importacion para ligas'])->syncRoles([$administrador,$operador]);
        //Permission::create(['name' => 'admin.payments.store','description' => ''])->syncRoles([$administrador,$operador]);
        //Permission::create(['name' => 'admin.payments.show','description' => ''])->syncRoles([$administrador,$operador]);
        //Permission::create(['name' => 'admin.payments.edit','description' => ''])->syncRoles([$administrador,$operador]);
        //Permission::create(['name' => 'admin.payments.update','description' => ''])->syncRoles([$administrador,$operador]);
        //Permission::create(['name' => 'admin.payments.destroy','description' => ''])->syncRoles([$administrador,$operador]);
        Permission::create(['name' => 'admin.payments.export','description' => 'Exportar Ligas'])->syncRoles([$administrador,$operador]);
    }
}
