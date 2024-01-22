@extends('layouts.admin',["page_name"=>'Roles Management'])
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Role Management</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Administrative Functions</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row my-4">
        <div class="col-4"></div>
        <div class="col-4"></div>
        <div class="col-4">
            <div class="d-grid gap-2">
                <a class="btn btn-primary btn-md btn-block waves-effect waves-light mb-1" data-bs-toggle="modal"
                   data-bs-target=".create-role">Create
                    Role</a>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table  table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Number of Permissions</th>
                            <th>Number of Users with Role</th>
                            <th>Configure</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $count = 1
                        @endphp
                        @foreach($roles as $role)

                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->number_of_permissions()}}</td>
                                <td>{{$role->number_of_users()}}</td>
                                <td>
                                    <div class="d-grid gap-2">
                                        <a href="{{url('roles/configure/'.$role->id)}}"
                                           class="btn btn-block btn-md btn-primary text text-white">
                                            <i class="icon-settings"></i> Configure
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-grid gap-2">
                                        <a data-bs-toggle="modal" data-bs-target=".edit-role{{$role->id}}"
                                           class="btn btn-block btn-md btn-primary text text-white">
                                            <i class="icon-edit"></i> Edit
                                        </a>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade edit-role{{$role->id}}"
                                         id="edit-role{{$role->id}}" tabindex="-1"
                                         aria-labelledby="" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <form action="{{route('update-role')}}" method="post">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="permissionModalLabel">Updating
                                                            Role</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row my-2">
                                                            <div class="col-md-12">
                                                                <label for="">Role Name</label>
                                                                <input type="hidden" name="id" value="{{$role->id}}">
                                                                <input type="text" name="name" class="form-control"
                                                                       value="{{$role->name}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary text text-white">
                                                            Update Role
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $count += 1
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade create-role" tabindex="-1" tabindex="-1" role="dialog"
         aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <form action="{{route('store-role')}}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="permissionModalLabel">Creating Role</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">Role Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary text text-white">Save Role</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
