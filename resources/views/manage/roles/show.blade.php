@section('page_title', 'Show Roles')

@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">{{$roles->display_name}}
                    <small class="m-l-25"><em>({{$roles->name}})</em></small>
                </h1>
                <h2>{{$roles->description}}</h2>
            </div>

            <div class="column">
                <a href="{{route('roles.edit', $roles->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i> Edit this Role</a>
            </div>

        </div>
        <hr class="m-t-0">

        <div class="columns is-multiline">
            <div class="column">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <h2 class="title">Permissions:</h2>
                                <ul>
                                    @foreach($roles->permissions as $r)
                                        <li>{{$r->display_name}} <em class="m-l-15">({{$r->description}})</em></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>

    </div> <!-- end of .flex-container -->

@endsection