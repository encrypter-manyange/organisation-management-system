@extends('layouts.admin',["page_name"=>'Permissions Management'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Permission Management</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Administrative Functions</a></li>
                        <li class="breadcrumb-item active">Permissions</li>
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
                   data-bs-target=".create-permission">Create
                    Permission</a>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons"
                           class="table table-striped table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Permission Name</th>
                            <th>Number of Roles Assigned</th>
                            <th class="text-center">Edit</th>
                        </tr>
                        </thead>
                        @php
                            $count = 1
                        @endphp
                        <tbody>
                        @foreach($permissions as $permission)

                            <td>{{$count}}</td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->number_of_roles()}}</td>
                            <td>
                                <a href="" data-bs-toggle="modal" data-bs-target=".edit-permission{{$permission->id}}"
                                   class="btn btn-block btn-md btn-primary text text-white">
                                    <i class="icon-edit"></i> Edit
                                </a>
                                <!-- Modal -->
                                <div class="modal fade edit-permission{{$permission->id}}"
                                     id="edit-permission{{$permission->id}}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <form action="{{route('update-permission')}}" method="post">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="permissionModalLabel">Updating
                                                        Permission</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="">Permission Name</label>
                                                            <input type="hidden" name="id" value="{{$permission->id}}">
                                                            <input type="text" name="name" class="form-control"
                                                                   value="{{$permission->name}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary text text-white">Update
                                                        Permission
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
    <div class="modal fade create-permission" tabindex="-1" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <form action="{{route('store-permission')}}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="permissionModalLabel">Creating Permission</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">Permission Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary text text-white">Save Permission</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
