@extends('layouts.admin',["page_name"=>'Role Configuration | '.ucfirst($role->name)])
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Role Configuration Panel</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Administrative Functions</a></li>
                        <li class="breadcrumb-item active">Permission Assignment</li>
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
    <div class="row ">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="live-preview">
                                <div class="row gy-4">
                                    <div class="col-xxl-6 col-md-6">
                                        <form action="{{route('remove-permission')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="card-title mb-0 flex-grow-1 pt-3 pb-3">Assigned Permissions</p>
                                                </div>
                                                <div class="col-6">
                                                    <p>
                                                        <span class="px-5 font-weight-bold">Select All</span>
                                                        <input type="checkbox" class="form-check-input" style="border: #0a121c solid 1px"
                                                               onClick="toggle2(this)"/>
                                                    </p>
                                                </div>
                                            </div>

                                            <table
                                                   class="table datatable table-striped table-bordered dt-responsive nowrap"
                                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>
Select
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($role->role_permissions as $count => $permission)
                                                    <tr>
                                                        <td>{{++$count}}</td>
                                                        <td>{{$permission->permission->name}}</td>
                                                        <td>
                                                            <p>
                                                                <input type="checkbox" class="form-check-input" style="border: #0a121c solid 1px"
                                                                       name="permissions1[]"
                                                                       value="{{$permission->id}}">
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                @if(count($role->role_permissions)>0)
                                                    <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <div class="d-grid gap-2">
                                                                <button type="submit"
                                                                        class="btn btn-primary text text-whitewaves-effect waves-light">
                                                                    Remove Permissions
                                                                </button>
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    </tfoot>
                                                @endif
                                            </table>
                                        </form>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-6 col-md-6">

                                        <form action="{{route('add-permission')}}" method="post">
                                            @csrf

                                            <input type="hidden" value="{{$role->id}}" name="role_id">

                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="card-title mb-0 flex-grow-1 pt-3 pb-3">Unassigned Permissions</p>
                                                </div>
                                                <div class="col-6">
                                                    <p>
                                                        <span class="px-5 font-weight-bold">Select All</span>
                                                        <input type="checkbox" class="form-check-input" style="border: #0a121c solid 1px"
                                                               onClick="toggle(this)"/>
                                                    </p>
                                                </div>
                                            </div>

                                            <table
                                                   class="table datatable table-striped  table-bordered dt-responsive nowrap"
                                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>
                                                        Select
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($role->missing_permissions() as $count => $permission)
                                                    <tr>
                                                        <td>{{++$count}}</td>
                                                        <td>{{$permission->name}}</td>
                                                        <td>
                                                            <p class="text-center">
                                                                <input type="checkbox" class="form-check-input" style="border: #0a121c solid 1px"
                                                                       name="permissions[]" value="{{$permission->id}}">
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                @if(count($role->missing_permissions())>0)
                                                    <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <button type="submit"
                                                                    class="btn btn-primary text text-whitebtn-block waves-effect waves-light">
                                                                Add Permissions
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                @endif
                                            </table>
                                        </form>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function toggle(source) {
            checkboxes = document.getElementsByName('permissions[]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function toggle2(source) {
            checkboxes = document.getElementsByName('permissions1[]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script>
@endsection
