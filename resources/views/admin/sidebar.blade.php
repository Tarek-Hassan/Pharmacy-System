<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">

        <img src="{{asset('control')}}/media/img/logo/logo2.png" alt="PhARmAcY Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PhARmAcY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            @auth("web")
                <img src="{{ Auth::user()->profile_pic ? Auth::user()->profile_pic : 'control/dist/img/user2-160x160.jpg'}}"
                    class="img-circle elevation-2" alt="User Image">
                    @endauth
            @auth("doctor")
                <img src="{{ Auth::guard('doctor')->user()->img ? Auth::guard('doctor')->user()->img : 'control/dist/img/user2-160x160.jpg'}}"
                    class="img-circle elevation-2" alt="User Image">
                    @endauth
            @auth("pharmacy")
                <img src="{{ Auth::guard('pharmacy')->user()->img ? Auth::guard('doctor')->user()->img : 'control/dist/img/user2-160x160.jpg'}}"
                    class="img-circle elevation-2" alt="User Image">
                    @endauth
            </div>
            <div class="info">

                @auth("web")
                <a href="#" class="d-block">{{Auth::user()->name }}</a>
                @endauth
                @auth("doctor")
                <a href="#" class="d-block">{{ Auth::guard('doctor')->user()->name }}</a>
                @endauth
                @auth("pharmacy")
                <a href="#" class="d-block">{{ Auth::guard('doctor')->user()->name }}</a>
                @endauth

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-notes-medical"></i>
                        <p>
                            Pharmacies
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>
                            Doctors
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('users')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{url('areas')}}" class="nav-link">
                        <i class="nav-icon fas fa-map-marker-alt"></i>
                        <p>
                            Areas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('address')}}" class="nav-link">
                        <i class="nav-icon fas fa-street-view"></i>
                        <p>
                            User Addresses
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-capsules"></i>
                        <p>
                            Medicines,
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-poll-h"></i>
                        <p>
                            ​ Orders,
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-donate"></i>
                        <p>
                            Revenue
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-cc-stripe"></i>
                        <p>
                            ​ Stripe_Payments
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('payment/create')}}" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>payment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('payment')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All_Transactions</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex"></div>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        class="nav-link">
                        <!-- <i class="nav-icon fas fa-portal-exit"></i> -->
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
