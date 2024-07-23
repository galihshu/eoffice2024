<nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header">
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
            <i class="ti-menu ti-close"></i>
        </a>

        <a class="navbar-brand" href="{{ url('/home') }}">
            <b class="logo-icon">
                <img src="{{ asset('zonaadmin/assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                <img src="{{ asset('zonaadmin/assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" />
            </b>
            <span class="logo-text">
                <img src="{{ asset('zonaadmin/assets/images/logo-text.png') }}" alt="homepage" class="dark-logo" />
                <img src="{{ asset('zonaadmin/assets/images/logo-light-text.png') }}" class="light-logo" alt="homepage" />
            </span>
        </a>
        
        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti-more"></i>
        </a>
    </div>

    <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <ul class="navbar-nav float-left mr-auto">
            <li class="nav-item d-none d-md-block">
                <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                    <i class="sl-icon-menu font-20"></i>
                </a>
            </li>

            <!-- Comment -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-bell font-20"></i>

                </a>
                <div class="dropdown-menu mailbox animated bounceInDown">
                    <span class="with-arrow">
                        <span class="bg-primary"></span>
                    </span>
                    <ul class="list-style-none">
                        <li>
                            <div class="drop-title bg-primary text-white">
                                <h4 class="m-b-0 m-t-5">4 New</h4>
                                <span class="font-light">Notifications</span>
                            </div>
                        </li>
                        <li>
                            <div class="message-center notifications">
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="btn btn-danger btn-circle">
                                        <i class="fa fa-link"></i>
                                    </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Launch Admin</h5>
                                        <span class="mail-desc">Just see the my new admin!</span>
                                        <span class="time">9:30 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="btn btn-success btn-circle">
                                        <i class="ti-calendar"></i>
                                    </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Event today</h5>
                                        <span class="mail-desc">Just a reminder that you have event</span>
                                        <span class="time">9:10 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="btn btn-info btn-circle">
                                        <i class="ti-settings"></i>
                                    </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Settings</h5>
                                        <span class="mail-desc">You can customize this template as you want</span>
                                        <span class="time">9:08 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="btn btn-primary btn-circle">
                                        <i class="ti-user"></i>
                                    </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Indosmart</h5>
                                        <span class="mail-desc">Just see the my admin!</span>
                                        <span class="time">9:02 AM</span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link text-center m-b-5" href="javascript:void(0);">
                                <strong>Check all notifications</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- End Comment -->
            
            <!-- Messages -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="font-20 ti-email"></i>

                </a>
                <div class="dropdown-menu mailbox animated bounceInDown" aria-labelledby="2">
                    <span class="with-arrow">
                        <span class="bg-danger"></span>
                    </span>
                    <ul class="list-style-none">
                        <li>
                            <div class="drop-title bg-danger text-white">
                                <h4 class="m-b-0 m-t-5">5 New</h4>
                                <span class="font-light">Messages</span>
                            </div>
                        </li>
                        <li>
                            <div class="message-center message-body">
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="user-img">
                                        <img src="{{ asset('zonaadmin/assets/images/users/galih.png') }}" alt="user" class="rounded-circle">
                                        <span class="profile-status online pull-right"></span>
                                    </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">{{ Auth::user()->name }}</h5>
                                        <span class="mail-desc">Just see the my admin!</span>
                                        <span class="time">9:30 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="user-img">
                                        <img src="{{ asset('zonaadmin/assets/images/users/2.jpg') }}" alt="user" class="rounded-circle">
                                        <span class="profile-status busy pull-right"></span>
                                    </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Indosmart</h5>
                                        <span class="mail-desc">I've sung a song! See you at</span>
                                        <span class="time">9:10 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="user-img">
                                        <img src="{{ asset('zonaadmin/assets/images/users/3.jpg') }}" alt="user" class="rounded-circle">
                                        <span class="profile-status away pull-right"></span>
                                    </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">dkonten</h5>
                                        <span class="mail-desc">I am a singer!</span>
                                        <span class="time">9:08 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="user-img">
                                        <img src="{{ asset('zonaadmin/assets/images/users/4.jpg') }}" alt="user" class="rounded-circle">
                                        <span class="profile-status offline pull-right"></span>
                                    </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">zonaklub</h5>
                                        <span class="mail-desc">Just see the my admin!</span>
                                        <span class="time">9:02 AM</span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link text-center link" href="javascript:void(0);">
                                <b>See all e-Mails</b>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- End Messages -->


        </ul>
        <!-- Right side toggle and nav items -->
        <ul class="navbar-nav float-right">
            
            <!-- User profile and search -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="{{ asset('zonaadmin/assets/images/users/galih.png') }}" alt="user" class="rounded-circle" width="31">
                </a>
                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                    <span class="with-arrow">
                        <span class="bg-primary"></span>
                    </span>
                    <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                        <div class="">
                            <img src="{{ asset('zonaadmin/assets/images/users/galih.png') }}" alt="user" class="img-circle" width="60">
                        </div>
                        <div class="m-l-10">
                            <h4 class="m-b-0">{{ Auth::user()->name }}</h4>
                            <p class=" m-b-0">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    <div class="dropdown-divider"></div>
                    <div class="p-l-30 p-10">
                        <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a>
                    </div>
                </div>
            </li>
            <!-- User profile and search -->
        </ul>
    </div>
</nav>