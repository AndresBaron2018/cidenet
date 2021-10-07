<header class="c-header c-header-light c-header-fixed c-header-with-subheader" id="main-header">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
        data-class="c-sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="c-header-nav mfs-auto">
        @role('admin')
			<li class="c-header-nav-item px-3">
				<a class="c-header-nav-link" href="{{ route('admin') }}">
					<i class="nav-icon fas fa-cogs"></i>
				</a>
			</li>
        @endrole
        <li class="c-header-nav-item dropdown d-md-down-none mx-2 px-3">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-bell text-danger"></i>
                <span class="badge badge-pill text-danger">{{ \auth()->user()->unreadNotifications->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
                <div class="dropdown-header bg-light">
                    <strong>{{ \auth()->user()->unreadNotifications->count() > 0 ? 'Unread Notifications' : "You don't have notifications" }}</strong>
                </div>
                @foreach (\auth()->user()->unreadNotifications as $notification)
                    <a class="dropdown-item"
                        href="{{ route('notification.markread', $notification->id) }}">{{ $notification->data['information'] }}</a>
                @endforeach
            </div>
        </li>
        <li class="c-header-nav-item dropdown px-3">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <div class="c-avatar">
                    <img class="c-avatar-img" src="/images/profile/{{ \Auth::user()->avatar }}">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="dropdown-header bg-light py-2">
                    <strong>Settings</strong>
                </div>
                <a class="dropdown-item" href="{{ route('logout') }}"><i class="c-icon mr-2 fa fa-lock"></i>Logout</a>
            </div>
        </li>
    </ul>
</header>
