@extends('layouts.admin',["page_name"=>$member->first_name.''.$member->last_name])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Membership Management</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('members')}}">Members</a></li>
{{--                        <li class="breadcrumb-item active">{{$business->name}}</li>--}}
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
    <div class="row my-6">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row my-3">
                        <div class="col-6"><h4>Member Details</h4></div>
                        <div class="col-6"></div>
                    </div>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Member Name</th>
                            <td>{{$member->first_name.' '.$member->middle_name.' '.$member->last_name}}</td>
                        </tr>
                        <tr>
                            <th>ID Number</th>
                            <td>{{$member->id_number}}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>{{$member->dob}}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{$member->gender}}</td>
                        </tr>
                        <tr>
                            <th>Mobile Number</th>
                            <td>{{$member->phone}}</td>
                        </tr>
                        <tr>
                            <th>Marital Status</th>
                            <td>{{$member->marital_status}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$member->address}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row my-3">
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md btn-block waves-effect waves-light mb-1" data-bs-toggle="modal"
                                   data-bs-target=".create-contribution">Capture
                                    Contribution</a>

                                <!-- Modal -->
                                <div class="modal fade create-contribution" tabindex="-1" tabindex="-1" role="dialog"
                                     aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                        <div class="modal-content">
                                            <form action="{{route('store-contribution')}}" method="post"  enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="permissionModalLabel">Creating Commodity</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="member_id" value="{{$member->id}}">
                                                            <label for="">Amount Paid <sup style="color: indianred"><b>required</b></sup> </label>
                                                            <input type="number" step="0.01" name="amount" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Description <sup style="color: indianred"><b>required</b></sup></label>
                                                            <input type="text" name="description" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Status <sup style="color: indianred"><b>required</b></sup></label>
                                                            <select name="status" class="form-control" required>
                                                                <option value="">-- Select Show Status --</option>
                                                                <option value="1">Approved</option>
                                                                <option value="0">Decline</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary text text-white">Save Contribution</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <a href="" data-bs-toggle="modal" data-bs-target=".edit-member{{$member->id}}"
                                   class="btn btn-block btn-md btn-dark text text-white">
                                    <i class="icon-edit"></i> Edit Member Details
                                </a>
                                <!-- Modal -->
                                <div class="modal fade edit-member{{$member->id}}"
                                     id="edit-member{{$member->id}}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <form action="{{route('update-member')}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="permissionModalLabel">Updating
                                                        Member Details</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Member First name <sup style="color: indianred"><b>required</b></sup> </label>
                                                            <input type="text" value="{{$member->first_name}}" name="first_name" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Member Middle name <sup style="color: indianred"><b>optional</b></sup> </label>
                                                            <input type="text" value="{{$member->middle_name}}" name="middle_name" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Member Last name <sup style="color: indianred"><b>required</b></sup> </label>
                                                            <input type="text" value="{{$member->last_name}}" name="last_name" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Phone Number <sup style="color: indianred"><b>required</b></sup></label>
                                                            <input type="text" value="{{$member->phone}}" name="phone" placeholder="+263783926320" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Marital Status <sup style="color: indianred"><b>required</b></sup></label>
                                                            <select name="marital_status" class="form-control">
                                                                <option value="">-- Select Marital Status --</option>
                                                                <option value="Single" {{$member->marital_status=='Single'?'selected':''}}>Single</option>
                                                                <option value="Married" {{$member->marital_status=='Married'?'selected':''}}>Married</option>
                                                                <option value="Divorced" {{$member->marital_status=='Divorced'?'selected':''}}>Divorced</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Gender <sup style="color: indianred"><b>required</b></sup></label>
                                                            <select name="gender" class="form-control">
                                                                <option value="">-- Select Gender --</option>
                                                                <option value="Male" {{$member->gender=='Male'?'selected':''}}>Male</option>
                                                                <option value="Female" {{$member->gender=='Female'?'selected':''}}>Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">ID Number <sup style="color: indianred"><b>required</b></sup></label>
                                                            <input type="text" value="{{$member->id_number}}" name="id_number" placeholder="63-2398400F60" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Date of Birth</label>
                                                            <input type="hidden" name="id" value="{{$member->id}}">
                                                            <input type="date" value="{{$member->dob}}" name="dob" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Physical Address</label>
                                                            <textarea name="address" class="form-control">{{$member->address}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary text text-white">Update
                                                        Member Details
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row my-5">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Member Statement</h4>
                        <p class="card-title-desc">All Membership Assets are Listed Here!</p>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Payments</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Statement</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="home1" role="tabpanel">
                                <div class="row">
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <td>Date</td>
                                            <td>Description</td>
                                            <td>Amount</td>
                                            <td>Adjudication</td>
                                        </tr>

                                        @foreach($contributions as $contribution)
                                            <tr>
                                                <td>{{$contribution->created_at}}</td>
                                                <td>{{$contribution->description}}</td>
                                                <td>${{number_format($contribution->amount,2)}}</td>
                                                <td>
                                                    <a href="" data-bs-toggle="modal" data-bs-target=".update-contribution{{$contribution->id}}"
                                                       class="btn btn-block btn-md btn-primary text text-white">
                                                        <i class="icon-edit"></i> Adjudicate
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade update-contribution{{$contribution->id}}"
                                                         id="update-contribution{{$contribution->id}}" tabindex="-1"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <form action="{{route('update-contribution')}}" method="post">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="permissionModalLabel">Updating
                                                                            Contribution</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <label for="">Status</label>
                                                                                <input type="hidden" name="id" value="{{$contribution->id}}">
                                                                                <select name="status" id=""
                                                                                        class="form-control">
                                                                                    <option value="">-- Select Status --</option>
                                                                                    <option value="1" {{$contribution->status?"selected":""}}>Approved</option>
                                                                                    <option value="0" {{!$contribution->status?"selected":""}}>Decline</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger"
                                                                                data-bs-dismiss="modal">Close
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary text text-white">Update
                                                                            Contribution
                                                                        </button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile1" role="tabpanel">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <td>Date</td>
                                        <td>Description</td>
                                        <td>Amount</td>
                                        <td>Running Balance</td>
                                    </tr>
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach($contributions as $contribution)
                                        @if($contribution->status)
                                        @php
                                            $total += $contribution->amount;
                                        @endphp
                                        <tr>
                                            <td>{{$contribution->created_at}}</td>
                                            <td>{{$contribution->description}}</td>
                                            <td>${{number_format($contribution->amount,2)}}</td>
                                            <td>${{number_format($total,2)}}</td>
                                        </tr>
                                        @endif

                                    @endforeach
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
        </div>
    </div>
@endsection
