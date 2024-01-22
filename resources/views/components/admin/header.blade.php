<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-end">
                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{asset('backend-assets/images/users/avatar-2.jpg')}}"
                             alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>
            </div>
            <div>
                <div class="navbar-brand-box">
                    <a href="{{url('/')}}" class="logo logo-light">
                        <span class="logo-sm">
{{--                            <img src="{{asset('backend-assets/images/logo-sm.png')}}" alt="" height="20">--}}
                        </span>
                        <span class="logo-lg">
{{--                            <img src="{{asset('backend-assets/images/logo-light.png')}}" alt="" height="19">--}}
                        </span>
                    </a>
                </div>
                <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                        id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</header>
