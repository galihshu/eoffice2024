<!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <!-- User Profile-->
            <li>
                <!-- User Profile-->
                <div class="user-profile dropdown m-t-20">
                    <div class="user-pic">
                        <img src="{{ asset('zonaadmin/assets/images/users/galih.png') }}" alt="users" class="rounded-circle img-fluid" />
                    </div>
                    <div class="user-content hide-menu m-t-10">
                        <h5 class="m-b-10 user-name font-medium">{{ Auth::user()->name }}</h5>
                        <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ti-settings"></i>
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" title="Logout" class="btn btn-circle btn-sm">
                            <i class="ti-power-off"></i>
                        </a>
                        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" title="Logout">
                                <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                </form>
                        </div>
                    </div>
                </div>
                <!-- End User Profile-->
            </li>

            <li class="sidebar-item {{ set_active('home') }}">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/home') }}" aria-expanded="false">
                    <i class="ti-home"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>

            <li class="{{ set_active(['posts.index','posts.create','posts.edit','categories.index','categories.create','categories.edit','tags.index','tags.create','tags.edit']) }}
              {{ set_open(['posts.index','posts.create','posts.edit','categories.index','categories.create','categories.edit','tags.index','tags.create','tags.edit']) }} sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="icon-Files"></i>
                    <span class="hide-menu">Posts </span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="{{ set_active('posts.index') }} sidebar-item">
                        <a href="{{ route('posts.index') }}" class="sidebar-link">
                            <i class="mdi mdi-format-align-left"></i>
                            <span class="hide-menu"> All Posts </span>
                        </a>
                    </li>

                    <li class="{{ set_active(['categories.index','categories.create','categories.edit'
                        ]) }} sidebar-item">
                        <a href="{{ route('categories.index') }}" class="sidebar-link">
                            <i class="mdi mdi-format-float-left"></i>
                            <span class="hide-menu"> Categories </span>
                        </a>
                    </li>
                    
                    <li class="{{ set_active(['tags.index','tags.create','tags.edit'
                        ]) }} sidebar-item">
                        <a href="{{ route('tags.index') }}" class="sidebar-link">
                            <i class="mdi mdi-format-float-left"></i>
                            <span class="hide-menu"> Tags </span>
                        </a>
                    </li>

                </ul>
            </li>
            
            <li class="{{ set_active(['pages.index','pages.create','pages.edit']) }} sidebar-item" >
                <a href="{{ route('pages.index') }}" class="sidebar-link">
                    <i class="icon-Files"></i>
                    <span class="hide-menu"> Pages </span>
                </a>
            </li>

            @can('users_manage')
            <li class="{{ set_active([
              'users.index','users.create','users.edit',
              'abilities.index','abilities.create','abilities.edit',
              'roles.index','roles.create','roles.edit'
              ]) }}
              {{ set_open([
              'abilities.index',
              'users.index','users.create','users.edit',
              'abilities.index','abilities.create','abilities.edit',
              'roles.index','roles.create','roles.edit'
              ]) }} sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="icon-Administrator"></i>
                    <span class="hide-menu">Users</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="{{ set_active(['abilities.index','abilities.create','abilities.edit']) }} sidebar-item">
                        <a href="{{ route('abilities.index') }}" class="sidebar-link">
                            <i class="mdi mdi-format-align-left"></i>
                            <span class="hide-menu"> Abilities </span>
                        </a>
                    </li>
                    <li class="{{ set_active(['roles.index','roles.create','roles.edit']) }} sidebar-item">
                        <a href="{{ route('roles.index') }}" class="sidebar-link">
                            <i class="mdi mdi-format-align-right"></i>
                            <span class="hide-menu"> Roles </span>
                        </a>
                    </li>
                    <li class="{{ set_active(['users.index','users.create','users.edit']) }} sidebar-item">
                        <a href="{{ route('users.index') }}" class="sidebar-link">
                            <i class="mdi mdi-format-float-left"></i>
                            <span class="hide-menu"> Users </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('settings_manage')
            <li class="{{ set_active(['setting.index','social.index','social.create','social.edit',]) }}
            {{ set_open(['setting.index','social.index','social.create','social.edit',]) }} sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="ti-settings"></i>
                    <span class="hide-menu">Settings</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="{{ set_active(['setting.index']) }} sidebar-item">
                        <a href="{{ route('setting.index') }}" class="sidebar-link">
                            <i class="mdi mdi-format-align-left"></i>
                            <span class="hide-menu"> Settings </span>
                        </a>
                    </li>
                    <li class="{{ set_active(['social.index','social.create','social.edit']) }} sidebar-item">
                        <a href="{{ route('social.index') }}" class="sidebar-link">
                            <i class="mdi mdi-format-align-right"></i>
                            <span class="hide-menu"> Social Media </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            <li class="{{ set_active([
              'albums.index','albums.create','albums.edit',
              'galleries.index','galleries.create','galleries.edit',
              'media.index','media.create','media.edit'
              ]) }}
              {{ set_open([
              'albums.index','albums.create','albums.edit',
              'galleries.index','galleries.create','galleries.edit',
              'media.index','media.create','media.edit'
              ]) }} sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="ti-gallery"></i>
                    <span class="hide-menu">Libraries</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="{{ set_active(['albums.index','albums.create','albums.edit']) }} sidebar-item">
                        <a href="{{ route('albums.index') }}" class="sidebar-link">
                            <i class="mdi mdi-format-align-left"></i>
                            <span class="hide-menu"> Albums </span>
                        </a>
                    </li>
                    <li class="{{ set_active(['galleries.index','galleries.create','galleries.edit']) }} sidebar-item">
                        <a href="{{ route('galleries.index') }}" class="sidebar-link">
                            <i class="mdi mdi-format-align-right"></i>
                            <span class="hide-menu"> Galleries </span>
                        </a>
                    </li>

                    <li class="{{ set_active(['media.index','media.create','media.edit']) }} sidebar-item">
                        <a href="{{ route('media.index') }}" class="sidebar-link">
                            <i class="mdi mdi-format-align-right"></i>
                            <span class="hide-menu"> Media </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" aria-expanded="false">
                    <i class="mdi mdi-directions"></i>
                    <span class="hide-menu">Log Out</span>
                </a>
                <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->