<?php

use Illuminate\Database\Seeder;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder {

	/**
	 *
	 */
	public function run() {
		DB::table( 'users' )->insert( [
			'name'     => 'John',
			'email'    => 'test@test.com',
			'password' => bcrypt( '1234' ),
		] );
	}
}
