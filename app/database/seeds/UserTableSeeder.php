<?php

class UserTableSeeder extends Seeder {
    public function run()
    {
        User::truncate();

        $users = [
            [
                'name' => 'Ryanda Putra',
                'username' => 'ryand',
                'password' => Hash::make('123456')
            ],
            [
                'name' => 'Velia',
                'username' => 'velia',
                'password' => Hash::make('123456')
            ],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('123456')
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }

    }
}
