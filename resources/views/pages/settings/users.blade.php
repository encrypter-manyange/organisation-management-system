@extends('layouts.admin',["page_name"=>'User Management'])
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">User Management</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Administrative Functions</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                <a data-bs-toggle="modal" class="btn btn-primary btn-md btn-block waves-effect waves-light mb-1"
                   data-bs-target=".bd-add-user-modal">Create
                    User</a>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons"
                           class="table table-striped table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Fullname</th>
                            <th>Email Address</th>
                            <th>Role Name</th>
                            <th>Status</th>
                            <th>Last Login At</th>
                            <th>Last Login IP</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        @php
                            $count = 1
                        @endphp
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                            <td>{{$count}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{optional($user->role)->name}}</td>
                            <td>{{$user->status?"Active":"Disabled"}}</td>
                            <td>{{$user->last_login}}</td>
                            <td>{{$user->last_login_ip}}</td>
                            <td>
                                <div class="d-grid gap-2">
                                    <a data-bs-toggle="modal" class="btn btn-primary btn-md btn-block waves-effect waves-light mb-1" data-bs-target=".bd-edit-user-modal{{$user->id}}">
                                        Edit
                                    </a>
                                </div>
                                <div class="modal fade bd-edit-user-modal{{$user->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mySmallModalLabel">Edit User</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('update-user')}}" method="post">
                                                    @csrf
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Fullname</label>
                                                            <input type="text" class="form-control" name="name" required
                                                                   value="{{$user->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Email Address</label>
                                                            <input type="hidden" name="id" value="{{$user->id}}"/>
                                                            <input type="text" class="form-control" name="email"
                                                                   required
                                                                   value="{{$user->email}}">
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Account Status</label>
                                                            <select name="status" id="" required class="form-control">
                                                                <option value="">-- Select Account Status --</option>
                                                                <option value="1" {{$user->status?"selected":""}}>
                                                                    Enable
                                                                </option>
                                                                <option value="0"{{!$user->status?"selected":""}}>
                                                                    Disable
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Role</label>
                                                            <select name="role_id" id="" required class="form-control">
                                                                <option value="">-- Select Role --</option>
                                                                @foreach($roles as $role)
                                                                    <option
                                                                        value="{{$role->id}}" {{$user->role_id==$role->id?"selected":""}}>{{$role->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="password">{{ __('Password') }}</label>
                                                            <input id="password" type="password"
                                                                   class="form-control" name="password"
                                                                    autocomplete="new-password">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-lighten"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary text text-white">
                                                            Update
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

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

    <div class="modal fade bd-add-user-modal" tabindex="-1" role="dialog"
         aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('store-user')}}" method="post">
                        @csrf
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">Fullname</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">Email Address</label>
                                <input type="text" class="form-control" name="email"
                                       required>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">Account Status</label>
                                <select name="status" id="" required class="form-control">
                                    <option value="">-- Select Account Status --</option>
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">Role</label>
                                <select name="role_id" id="" required class="form-control">
                                    <option value="">-- Select Role --</option>
                                    @foreach($roles as $role)
                                        <option
                                            value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                       class="form-control" name="password"
                                       required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="password">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-lighten"
                                    data-dismiss="modal">Close
                            </button>
                            <button type="submit" class="btn btn-primary text text-white">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
