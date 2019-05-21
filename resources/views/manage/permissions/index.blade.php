@section('page_title', 'Permission')

@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Manage Users</h1>
            </div>
            <div class="column">
                <a href="{{route('permissions.create')}}" class="button is-primary is-pulled-right">Create New
                    Permission</a>
            </div>
        </div>
        <hr class="m-t-0">

        <div class="card">
            <div class="card-content">
                <table class="table is-narrow is-fullwidth is-hoverable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Display Name</th>
                        <th>Slug</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <th>{{$permission->id}}</th>
                            <td>{{$permission->display_name}}</td>
                            <td>{{$permission->name}}</td>
                            <td class="has-text-right">
                                <a class="button is-outlined m-r-5"
                                   href="{{route('permissions.show', $permission->id)}}">View</a>
                                <a class="button is-light"
                                   href="{{route('permissions.edit', $permission->id)}}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div> <!-- end of .card -->

    </div>
@endsection