<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    @auth
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell nav-icon mr-3"></i>
                @if(auth()->user()->unreadNotifications->count())
                <span class="badge badge-warning navbar-badge">{{ auth()->user()->unreadNotifications->count() }}
                </span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{route('mark')}}"><span class="dropdown-item dropdown-header">
                        <i class="fas fa-envelope mr-2"></i>{{ auth()->user()->unreadNotifications->count() }}
                        MarkAllAsRead</span></a>

                </a>
                {{--dd(var_dump(auth()->user()->unreadNotifications))--}}
                @foreach(auth()->user()->unreadNotifications as $notification)

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item bg-info">
                    {{ $notification->data['data'] }}

                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                @endforeach

                @foreach(auth()->user()->readNotifications as $read)
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    {{ $read->data['data'] }}
                    <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                </a>

                @endforeach
                <div class="dropdown-divider"></div>
                <!-- <a href="#" class="dropdown-item dropdown-footer">Delete All Notifications</a> -->
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                    class="fas fa-th-large"></i></a>
        </li>
    </ul>
    @endauth
</nav>
