@extends('layouts.admin',["page_name"=>'Membership Repository'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Members Management</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('members')}}">Members Repository</a></li>
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
                   data-bs-target=".create-member">Create
                    Member</a>
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
                            <th>Fullname</th>
                            <th>ID Number</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Marital Status</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>
                        </thead>
                        @php
                            $count = 1
                        @endphp
                        <tbody>
                        @foreach($members as $member)

                            <td>{{$count}}</td>
                            <td>
                                <a href="{{url('members/show/'.$member->id)}}" class="text-decoration-underline">
                                {{$member->first_name.' '.$member->middle_name.' '.$member->last_name}}
                                </a>
                            </td>
                            <td>{{$member->id_number}}</td>
                            <td>{{$member->dob}}</td>
                            <td>{{$member->gender}}</td>
                            <td>{{$member->marital_status}}</td>
                            <td>{{$member->phone}}</td>
                            <td>{{$member->address}}</td>
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
    <div class="modal fade create-member" tabindex="-1" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <form action="{{route('store-member')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="permissionModalLabel">Creating Member Record</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">Member First name <sup style="color: indianred"><b>required</b></sup> </label>
                                <input type="text" name="first_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">Member Middle name <sup style="color: indianred"><b>optional</b></sup> </label>
                                <input type="text" name="middle_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">Member Last name <sup style="color: indianred"><b>required</b></sup> </label>
                                <input type="text" name="last_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">Phone Number <sup style="color: indianred"><b>required</b></sup></label>
                                <input type="text" name="phone" placeholder="+263783926320" class="form-control" required>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">Marital Status <sup style="color: indianred"><b>required</b></sup></label>
                                <select name="marital_status" class="form-control">
                                    <option value="">-- Select Marital Status --</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">Gender <sup style="color: indianred"><b>required</b></sup></label>
                                <select name="gender" class="form-control">
                                    <option value="">-- Select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">ID Number <sup style="color: indianred"><b>required</b></sup></label>
                                <input type="text" name="id_number" placeholder="63-2398400F60" class="form-control" required>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">Date of Birth</label>
                                <input type="date" name="dob" class="form-control">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <label for="">Physical Address</label>
                                <textarea name="address" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary text text-white">Save Member Details</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
