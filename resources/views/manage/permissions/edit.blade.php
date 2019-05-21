@section('page_title', 'Create Users')

@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit Permission</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column">
                <form action="{{route('permissions.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="block">
                        <b-radio name="permission_type" v-model="permissionType" native-value="basic">Basic Permission
                        </b-radio>
                        <b-radio name="permission_type" v-model="permissionType" native-value="crud">CRUD Permission
                        </b-radio>
                    </div>
                    <div class="field" v-if="permissionType == 'basic'">
                        <label for="display_name" class="label">Name (Display Name):</label>
                        <div class="control">
                            <input type="text" class="input" name="display_name" id="display_name">
                        </div>
                    </div>

                    <div class="field" v-if="permissionType == 'basic'">
                        <label for="slug" class="label">Slug:</label>
                        <div class="control">
                            <input type="text" class="input" name="slug" id="slug">
                        </div>
                    </div>

                    <div class="field" v-if="permissionType == 'basic'">
                        <label for="description" class="label">Description:</label>
                        <div class="control">
                            <input type="text" class="input" name="description" id="description"
                                   placeholder="Describe what this permission does">
                        </div>
                    </div> <!-- end basic permisson -->

                    <div class="field" v-if="permissionType == 'crud'">
                        <label for="resource" class="label">Resource</label>
                        <p class="control">
                            <input type="text" class="input" name="resource" id="resource" v-model="resource"
                                   placeholder="The name of the resource">
                        </p>
                    </div>

                    <div class="columns" v-if="permissionType == 'crud'">
                        <div class="column is-one-quarter">
                            <div class="field">
                                <b-checkbox v-model="crudSelected" native-value="create">Create</b-checkbox>
                            </div>
                            <div class="field">
                                <b-checkbox v-model="crudSelected" v-model="crudSelected" native-value="read">Read
                                </b-checkbox>
                            </div>
                            <div class="field">
                                <b-checkbox v-model="crudSelected" native-value="update">Update</b-checkbox>
                            </div>
                            <div class="field">
                                <b-checkbox v-model="crudSelected" native-value="delete">Delete</b-checkbox>
                            </div>
                        </div> <!-- end of .column -->

                        <input type="hidden" name="crud_selected" :value="crudSelected">

                        <div class="column">
                            <table class="table is-narrow is-fullwidth" v-if="resource.length >= 3 && crudSelected.length > 0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in crudSelected">
                                    <td v-text="crudName(item)"></td>
                                    <td v-text="crudSlug(item)"></td>
                                    <td v-text="crudDescription(item)"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <button class="button is-success">Create Permission</button>
                </form>
            </div>
        </div>

    </div> <!-- end of .flex-container -->

@endsection