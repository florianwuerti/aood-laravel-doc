@section('page_title', 'Show User')

@extends('layouts.manage')

@section('content')

    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">View User Details</h1>
            </div> <!-- end of column -->
            <div class="column">
                <a href="{{route('users.edit', $user->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i> Edit User</a>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="email" class="label">Name</label>
                    <div class="p-l-0 p-t-0">{{$user->name}}</div>
                </div>
                <div class="field">
                    <label for="email" class="label">Email</label>
                    <div class="p-l-0 p-t-0">{{$user->email}}</div>
                </div>

            </div>
        </div>
    </div>
@endsection