<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
 		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		// $this->call('BooksTableSeeder');
		// $this->call('AuthorsTableSeeder');
		// $this->call('PostTableSeeder');

		// $this->call('UserTableSeeder');
		// $this->call('RolesTableSeeder');
  		//$this->call('PermissionsTableSeeder');

 		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
