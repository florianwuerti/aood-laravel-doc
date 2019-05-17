<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {

		DB::table( 'users' )->insert( [
			'name'     => 'John',
			'email'    => 'test@test.com',
			'password' => bcrypt( '1234' ),
		] );
	}
}
