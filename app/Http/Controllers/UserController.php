<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Hash;
use Session;

class UserController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$users = User::orderBy( 'id', 'desc' )->paginate( 2 );

		return view( 'manage.users.index', compact( 'users' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view( 'manage.users.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		$this->validateWith( [
			'name'  => 'required|max:255',
			'email' => 'required|email|unique:users'
		] );
		if ( ! empty( $request->password ) ) {
			$password = trim( $request->password );
		} else {
			# set the manual password
			$length   = 10;
			$keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
			$str      = '';
			$max      = mb_strlen( $keyspace, '8bit' ) - 1;
			for ( $i = 0; $i < $length; ++ $i ) {
				$str .= $keyspace[ random_int( 0, $max ) ];
			}
			$password = $str;
		}
		$user           = new User();
		$user->name     = $request->name;
		$user->email    = $request->email;
		$user->password = Hash::make( $password );
		$user->save();


		$user->syncRoles([$request->roles]);

		return redirect()->route( 'users.show', $user->id );

		/*if () {
			return redirect()->route( 'users.show', $user->id );
		} else {
			Session::flash( 'danger', 'Sorry a problem occurred while creating this user.' );

			return redirect()->route( 'users.create' );
		}*/
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {

		$user = User::where( 'id', $id )->with( 'roles' )->first();

		return view( 'manage.users.show', compact( 'user' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {

		$roles = Role::all();

		$user  = User::where( 'id', $id )->with( 'roles' )->first();

		return view( 'manage.users.edit', compact( 'user', 'roles' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		$this->validate( $request, [
			'name'  => 'required|max:255',
			'email' => 'required|email|unique:users,email,' . $id
		] );

		$user        = User::findOrFail( $id );
		$user->name  = $request->name;
		$user->email = $request->email;

		if ( $request->password_option == 'auto' ) {

			$length   = 10;
			$keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
			$str      = '';
			$max      = mb_strlen( $keyspace, '8bit' ) - 1;

			for ( $i = 0; $i < $length; ++ $i ) {
				$randomInt = random_int( 0, $max );
				$str       .= $keyspace[ $randomInt ];
			}

			$user->password = Hash::make( $str );

		} elseif ( $request->password_options == 'manual' ) {
			$user->password = Hash::make( $request->password );
		}


		$user->syncRoles([$request->roles]);

		return redirect()->route( 'users.show', $user->id );


		/*if ( $user->save() ) {
			return redirect()->route( 'users.show', $user->id );
		} else {

			Session::flash( 'error', 'There was a problem saving the updated user info to the database. Try again.' );

			return redirect()->route( 'users.show', $user->id );
		} */
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		//
	}
}
