@section('page_title', 'Create Users')

@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Manage Permissions</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column">
                {{$permission}}
            </div>
        </div>

    </div> <!-- end of .flex-container -->

@endsection