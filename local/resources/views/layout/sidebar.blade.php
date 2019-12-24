<nav id="sidebar" class="sidebar-wrapper">

    <!-- sidebar-brand -->
    <div class="sidebar-brand">
        <img />
        <!-- <a href="#">PriceSanond</a> -->
        <span id="pin-sidebar" class="active"></span>
        <!-- <span id="toggle-sidebar"></span> -->
    </div>

    <!-- sidebar-content -->
    <div class="sidebar-content">
        <!-- sidebar-header -->
        <div class="sidebar-item sidebar-header d-none">
            <div class="user-pic">
                <!-- <img class="img-responsive img-rounded" src="./../../img/avatar.svg" alt="User picture"> -->
                <img class="img-responsive img-rounded" src="{{ asset('asset/img/avatar.svg') }}" alt="User picture">
                
            </div>
            <div class="user-info">
                <span class="user-name">Jhon
                    <strong>Smith</strong>
                </span>
                <span class="user-role">Administrator</span>
                <span class="user-status">
                    <i class="fa fa-circle"></i>
                    <span>Online</span>
                </span>
            </div>
        </div>
        <!-- sidebar-search -->
        <div class="sidebar-item sidebar-search d-none">
            <div>
                <div class="input-group">
                    <input type="text" class="form-control search-menu" placeholder="Search...">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="material-icons" aria-hidden="true">search</i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- sidebar-menu -->
        <div class="sidebar-item sidebar-menu">
            <ul>
                <li class="header-menu">
                    <span>General</span>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="material-icons">dashboard</i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="#">Dashboard 1</a>
                            </li>
                            <li>
                                <a href="#">Dashboard 2</a>
                            </li>
                            <li>
                                <a href="#">Dashboard 3</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ url('masterpage') }}">
                        <i class="material-icons">folder</i>
                        <span class="menu-text">Master data</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('dailytime') }}">
                        <i class="material-icons">event</i>
                        <span class="menu-text">Daily time sheet</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons">monetization_on</i>
                        <span class="menu-text">Invoice</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons">account_circle</i>
                        <span class="menu-text">Personal</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- sidebar-footer -->
    <div class="sidebar-footer d-none">
        <div class="dropdown">

            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons mt-2">notifications</i>
                <span class="badge badge-pill badge-warning notification">3</span>
            </a>
            <div class="dropdown-menu notifications" aria-labelledby="dropdownMenuMessage">
                <div class="notifications-header">
                    <i class="material-icons pr-2">notifications</i>
                    Notifications
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <div class="notification-content">
                        <div class="icon">
                            <i class="material-icons text-success border border-success">done</i>
                        </div>
                        <div class="content">
                            <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. In totam explicabo</div>
                            <div class="notification-time">
                                6 minutes ago
                            </div>
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="notification-content">
                        <div class="icon">
                            <i class="material-icons text-info border border-info">priority_high</i>
                        </div>
                        <div class="content">
                            <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. In totam explicabo</div>
                            <div class="notification-time">
                                Today
                            </div>
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="notification-content">
                        <div class="icon">
                            <i class="material-icons text-warning border border-warning">error_outline</i>
                        </div>
                        <div class="content">
                            <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. In totam explicabo</div>
                            <div class="notification-time">
                                Yesterday
                            </div>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-center" href="#">View all notifications</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons mt-2">mail</i>
                <span class="badge badge-pill badge-success notification">7</span>
            </a>
            <div class="dropdown-menu messages" aria-labelledby="dropdownMenuMessage">
                <div class="messages-header">
                    <i class="material-icons pr-2">mail</i>
                    Messages
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <div class="message-content">
                        <div class="pic">
                            <!-- <img src="../../img/avatar.svg" alt=""> -->
                            <img class="img-responsive img-rounded" src="{{ asset('asset/img/avatar.svg') }}" alt="User picture">
                        </div>
                        <div class="content">
                            <div class="message-title">
                                <strong> Jhon doe</strong>
                            </div>
                            <div class="message-detail">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. In totam explicabo</div>
                        </div>
                    </div>

                </a>
                <a class="dropdown-item" href="#">
                    <div class="message-content">
                        <div class="pic">
                            <!-- <img src="../../img/avatar.svg" alt=""> -->
                            <img class="img-responsive img-rounded" src="{{ asset('asset/img/avatar.svg') }}" alt="User picture">
                        </div>
                        <div class="content">
                            <div class="message-title">
                                <strong> Jhon doe</strong>
                            </div>
                            <div class="message-detail">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. In totam explicabo</div>
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="message-content">
                        <div class="pic">
                            <!-- <img src="../../img/avatar.svg" alt=""> -->
                            <img class="img-responsive img-rounded" src="{{ asset('asset/img/avatar.svg') }}" alt="User picture">
                        </div>
                        <div class="content">
                            <div class="message-title">
                                <strong> Jhon doe</strong>
                            </div>
                            <div class="message-detail">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. In totam explicabo</div>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-center" href="#">View all messages</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons mt-2">settings_applications</i>
                <span class="badge-sonar"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuMessage">
                <a class="dropdown-item" href="#">My profile</a>
                <a class="dropdown-item" href="#">Help</a>
                <a class="dropdown-item" href="#">Setting</a>
            </div>
        </div>
        <div>
            <a href="#">
                <i class="material-icons mt-2">lock</i>
            </a>
        </div>
        <div class="pinned-footer">
            <a href="#">
                <i class="material-icons">more_horiz</i>
            </a>
        </div>
    </div>

</nav>