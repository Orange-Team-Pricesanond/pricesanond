<?php
    if (Auth::check())
    {
        url('masterpage');
    }else{
        url('login');
    }
?>
<header class="work-head">
    <ul class="head-menu nav nav-tabs" id="nav-group" role="tablist">
        <li><span class="head-tab font-weight-bold">Page Title</span></li>
    </ul>
    <ul>
        <li class="m-0">
            <button class="btn-c material-icons ml-1" title="Search Protocol">search</button>
        </li>
        <li class="dropdown">
            <button class="btn-c material-icons ml-1 dropdown-toggle" type="button" id="i_noti" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,8" title="Notifications">notifications</button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="i_noti">
                <h6 class="dropdown-header">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item d-flex justify-content-between align-items-center align-items-center" href="#">
                    <span>Revise</span>
                    <span class="badge badge-danger" style="height: 15px; min-width: 15px; border-radius: 10px;">1</span>
                </a>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                    <span>Review</span>
                    <span class="badge badge-danger" style="height: 15px; min-width: 15px; border-radius: 10px;">1</span>
                </a>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                    <span>Approved</span>
                    <span class="badge badge-danger" style="height: 15px; min-width: 15px; border-radius: 10px;">1</span>
                </a>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                    <span>Invoice</span>
                    <span class="badge badge-danger" style="height: 15px; min-width: 15px; border-radius: 10px;">1</span>
                </a>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                    <span>Rejected</span>
                    <span class="badge badge-danger" style="height: 15px; min-width: 15px; border-radius: 10px;">1</span>
                </a>
            </div>
        </li>
        <li class="dropdown">
            <button class="btn-c member ml-1 dropdown-toggle" type="button" id="i_member" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,7" title="Username">
                <span class="overflow-hidden">
                    <img class="img-responsive img-rounded" src="{{url('local/public/user/').'/'.Auth::user()->images }}" alt="User picture">
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="i_member">
                <h6 class="dropdown-header">{{ Auth::user()->name }}  </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Profile Setting</a>
                
                <a class="dropdown-item" href="javascript:void(0)" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off m-r-5 m-l-5"></i> Signout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>

            </div>
        </li>
    </ul>
</header>