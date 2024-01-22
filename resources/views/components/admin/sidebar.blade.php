<div class="vertical-menu">
    <div class="h-100">
        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="{{asset('backend-assets/images/users/avatar-2.jpg')}}" alt="" class="avatar-md mx-auto rounded-circle">
            </div>
            <div class="mt-3">
                <a href="#" class="text-body fw-medium font-size-16">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                <p class="text-muted mt-1 mb-0 font-size-13">{{\Illuminate\Support\Facades\Auth::user()->role->role_name}}</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">ADMINISTRATION FUNCTIONS</li>
                <li>
                    <a href="{{url('users')}}" class=" waves-effect">
                        <i class="mdi mdi-worker"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('permissions')}}" class=" waves-effect">
                        <i class="mdi mdi-account-card-details-outline"></i>
                        <span>Permissions</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('roles')}}" class=" waves-effect">
                        <i class="mdi mdi-account-group"></i>
                        <span>Roles</span>
                    </a>
                </li>

                <li class="menu-title">System Functions</li>

                <li>
                    <a href="{{url('members')}}" class=" waves-effect">
                        <i class="mdi mdi-alpha-c-circle-outline"></i>
                        <span>Membership Management</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
