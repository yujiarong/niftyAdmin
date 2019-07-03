<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permission::truncate();
        $created_at = date('Y-m-d H:i:s');
        $permissions = [
            [ 'name'=> 'access.role.index' ,'guard_name'=>'web',"created_at"=>$created_at ],
            [ 'name'=> 'access.user.index' ,'guard_name'=>'web',"created_at"=>$created_at ],
            [ 'name'=> 'access.permission.index' ,'guard_name'=>'web',"created_at"=>$created_at ],
            [ 'name'=> 'access.role.edit' ,'guard_name'=>'web',"created_at"=>$created_at ],
            [ 'name'=> 'access.role.delete' ,'guard_name'=>'web',"created_at"=>$created_at ],
            [ 'name'=> 'access.user.edit' ,'guard_name'=>'web',"created_at"=>$created_at ],
            [ 'name'=> 'access.user.delete' ,'guard_name'=>'web',"created_at"=>$created_at ],
            [ 'name'=> 'access.permission.edit' ,'guard_name'=>'web',"created_at"=>$created_at ],
            [ 'name'=> 'access.permission.delete' ,'guard_name'=>'web',"created_at"=>$created_at ],
        ];
        Permission::insert($permissions);
        Role::create([
                        'name'       => 'admin',
                        'guard_name' => 'web',
                      ]
        );
    }
}
