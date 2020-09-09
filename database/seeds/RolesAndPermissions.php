<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'create responsable']);
        Permission::create(['name' => 'read responsable']);
        Permission::create(['name' => 'update responsable']);
        Permission::create(['name' => 'delete responsable']);

        Permission::create(['name' => 'create custodio']);
        Permission::create(['name' => 'read custodio']);
        Permission::create(['name' => 'update custodio']);
        Permission::create(['name' => 'delete custodio']);

        Permission::create(['name' => 'create operador']);
        Permission::create(['name' => 'read operador']);
        Permission::create(['name' => 'update operador']);
        Permission::create(['name' => 'delete operador']);

        Permission::create(['name' => 'create proveedor']);
        Permission::create(['name' => 'read proveedor']);
        Permission::create(['name' => 'update proveedor']);
        Permission::create(['name' => 'delete proveedor']);

        Permission::create(['name' => 'create adquisicion']);
        Permission::create(['name' => 'read adquisicion']);
        Permission::create(['name' => 'update adquisicion']);
        Permission::create(['name' => 'delete adquisicion']);


        Permission::create(['name' => 'create almacen']);
        Permission::create(['name' => 'read almacen']);
        Permission::create(['name' => 'update almacen']);
        Permission::create(['name' => 'delete almacen']);

        Permission::create(['name' => 'create baja']);
        Permission::create(['name' => 'read baja']);
        Permission::create(['name' => 'update baja']);
        Permission::create(['name' => 'delete baja']);

        Permission::create(['name' => 'create bien']);
        Permission::create(['name' => 'read bien']);
        Permission::create(['name' => 'update bien']);
        Permission::create(['name' => 'delete bien']);

        Permission::create(['name' => 'create categoria']);
        Permission::create(['name' => 'read categoria']);
        Permission::create(['name' => 'update categoria']);
        Permission::create(['name' => 'delete categoria']);

        Permission::create(['name' => 'create departamento']);
        Permission::create(['name' => 'read departamento']);
        Permission::create(['name' => 'update departamento']);
        Permission::create(['name' => 'delete departamento']);

        Permission::create(['name' => 'read log_change']);
        

        Permission::create(['name' => 'create depresiacion']);
        Permission::create(['name' => 'read depresiacion']);
        Permission::create(['name' => 'update depresiacion']);
        Permission::create(['name' => 'delete depresiacion']);

        Permission::create(['name' => 'create detalleAdquisicion']);
        Permission::create(['name' => 'read detalleAdquisicion']);
        Permission::create(['name' => 'update detalleAdquisicion']);
        Permission::create(['name' => 'delete detalleAdquisicion']);

        Permission::create(['name' => 'create mantenimiento']);
        Permission::create(['name' => 'read mantenimiento']);
        Permission::create(['name' => 'update mantenimiento']);
        Permission::create(['name' => 'delete mantenimiento']);

        Permission::create(['name' => 'create revaluo']);
        Permission::create(['name' => 'read revaluo']);
        Permission::create(['name' => 'update revaluo']);
        Permission::create(['name' => 'delete revaluo']);

        Permission::create(['name' => 'create revision']);
        Permission::create(['name' => 'read revision']);
        Permission::create(['name' => 'update revision']);
        Permission::create(['name' => 'delete revision']);

        Permission::create(['name' => 'create rubro']);
        Permission::create(['name' => 'read rubro']);
        Permission::create(['name' => 'update rubro']);
        Permission::create(['name' => 'delete rubro']);

		
		Permission::create(['name' => 'create solicitud']);
        Permission::create(['name' => 'read solicitud']);
        Permission::create(['name' => 'update solicitud']);
        Permission::create(['name' => 'delete solicitud']);

        Permission::create(['name' => 'create transferencia']);
        Permission::create(['name' => 'read transferencia']);
        Permission::create(['name' => 'update transferencia']);
        Permission::create(['name' => 'delete transferencia']);

        Permission::create(['name' => 'create ubicacion']);
        Permission::create(['name' => 'read ubicacion']);
        Permission::create(['name' => 'update ubicacion']);
        Permission::create(['name' => 'delete ubicacion']);


//--------------------Super-admin-----------------------------------
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

//----------------------Responsable---------------------------------
        $role = Role::create(['name' => 'responsable']);
        $role->givePermissionTo('create adquisicion');
        $role->givePermissionTo('read adquisicion');
        $role->givePermissionTo('update adquisicion');
        $role->givePermissionTo('delete adquisicion');
    
        $role->givePermissionTo('create detalleAdquisicion');
        $role->givePermissionTo('read detalleAdquisicion');
        $role->givePermissionTo('update detalleAdquisicion');
        $role->givePermissionTo('delete detalleAdquisicion');

		$role->givePermissionTo('create transferencia');
        $role->givePermissionTo('read transferencia');
        $role->givePermissionTo('update transferencia');
        $role->givePermissionTo('delete transferencia');
    


        $role->givePermissionTo('create baja');
        $role->givePermissionTo('read baja');
        $role->givePermissionTo('update baja');
        $role->givePermissionTo('delete baja');

        $role->givePermissionTo('create bien');
        $role->givePermissionTo('read bien');
        $role->givePermissionTo('update bien');
        $role->givePermissionTo('delete bien');

        $role->givePermissionTo('read mantenimiento');

        $role->givePermissionTo('read solicitud');

        $role->givePermissionTo('read departamento');


        $role->givePermissionTo('read proveedor');


//-----------------------custodio-------------------------------
        $role = Role::create(['name' => 'custodio']);
        $role->givePermissionTo('read bien');

        $role->givePermissionTo('create solicitud');
        $role->givePermissionTo('read solicitud');
        $role->givePermissionTo('update solicitud');
        $role->givePermissionTo('delete solicitud');

        $role->givePermissionTo('read responsable');


//--------------------operador-------------------------------------
        $role = Role::create(['name' => 'operador']);
        $role->givePermissionTo('create mantenimiento');
        $role->givePermissionTo('read mantenimiento');
        $role->givePermissionTo('update mantenimiento');
        $role->givePermissionTo('delete mantenimiento');

        $role->givePermissionTo('create revision');
        $role->givePermissionTo('read revision');
        $role->givePermissionTo('update revision');
        $role->givePermissionTo('delete revision');

		$role->givePermissionTo('create revaluo');
        $role->givePermissionTo('read revaluo');
        $role->givePermissionTo('update revaluo');
        $role->givePermissionTo('delete revaluo');


    }


}
