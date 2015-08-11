<?php
class PermissionsTableSeeder extends Seeder {
    public function run()
    {
        DB::table('permissions')->truncate();
        $permissions = array(
            array( // 1
                'name'         => 'adm',
                'display_name' => 'Admin'
            ),
            array( // 2
                'name'         => 'usr',
                'display_name' => 'User'
            )
        );

        foreach($permissions as $permission){
            Permission::create($permission);
        }

        // DB::table('permissions')->insert( $permissions );

        DB::table('permission_role')->truncate();

        $user = Role::where('name', '=', 'User')->first()->id;
        $admin = Role::where('name', '=', 'Admin')->first()->id;

        $permission_role = array(
            array(
                'role_id'       => $user,
                'permission_id' => $user
            ),
            array(
                'role_id'       => $admin,
                'permission_id' => $admin
            ),
        );
        DB::table('permission_role')->insert( $permission_role );
    }
}