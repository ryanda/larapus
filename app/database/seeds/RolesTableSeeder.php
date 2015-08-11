<?php
class RolesTableSeeder extends Seeder {
    public function run()
    {
        DB::table('roles')->truncate();
        DB::table('assigned_roles')->truncate();

        $admin = new Role;
        $admin->name = 'Admin';
        $admin->save();
      
        $user = new Role;
        $user->name = 'User';
        $user->save();

        $user1 = User::where('username','=','ryand')->first();
        $user1->attachRole($user);
        $user2 = User::where('username','=','velia')->first();
        $user2->attachRole($user);
        $user3 = User::where('username','=','admin')->first();
        $user3->attachRole($admin);
    }
}