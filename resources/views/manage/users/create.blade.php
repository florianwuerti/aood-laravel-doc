@section('page_title', 'Create Users')

@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Create new Users</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column">
                <form action="{{route('users.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="field">
                        <label for="name" class="label">Name:</label>
                        <div class="control">
                            <input type="text" class="input" name="name" id="name">
                        </div>
                    </div>

                    <div class="field">
                        <label for="email" class="label">Email:</label>
                        <div class="control">
                            <input type="email" class="input" name="email" id="email">
                        </div>
                    </div>

                    <div class="field">
                        <label for="password" class="label">Password:</label>
                        <div class="control">
                            <input type="password" class="input" name="password" id="password" v-if="!auto_password"
                                   placeholder="Manually give a password to this user">
                            <b-checkbox name="auto_generate" class="m-t-15" v-model="auto_password">Auto Generate
                                Password
                            </b-checkbox>
                        </div>
                    </div>
                    <button class="button is-success">Create User</button>
                </form>
            </div>
        </div>

    </div> <!-- end of .flex-container -->

@endsection