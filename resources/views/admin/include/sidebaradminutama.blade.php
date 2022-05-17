<div class="col-md-3 left_col">
  <div class="left_col scroll-view">


    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="{{ URL::asset('adminutama/production/images/logo3.png')}}" alt="..." class="img-circle profile_img" >
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        @php
        $tescekposisi = DB::table('users')
            ->leftJoin('posisi', 'posisi.id_posisi', '=', 'users.posisi') 
            ->where('users.id' ,'=', Auth::user()->id)
            ->first();
        @endphp
        <h2>{{  $tescekposisi->nama_posisi }}</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">

          <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ Route('home') }}">Dashboard</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-edit"></i> Data Pelamar <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ Route('ListPemohon') }}">Pelamar</a></li>
            </ul>
          </li>
          @if(Auth::user()->level == "1" || Auth::user()->level == "4")
          <li><a><i class="fa fa-users"></i> Data User <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ url('/user') }}">User</a></li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
      <!--tambahan untuk menu section-->
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li class="nav-item dropdown open" style="padding-left: 15px;">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="{{ URL::asset('admin/dist/img/logo2.png') }}" alt="">{{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"  href="javascript:;">
                <span>Settings</span>
            </a>

            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();"><i class="fa fa-sign-out pull-right"></i>@csrf Log Out</a>
            <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>

          </div>
        </li>

        <!--li role="presentation" class="nav-item dropdown open">
          <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">6</span>
          </a>
          <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
            <li class="nav-item">
              <a class="dropdown-item">
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="dropdown-item">
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="dropdown-item">
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="dropdown-item">
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li class="nav-item">
              <div class="text-center">
                <a class="dropdown-item">
                  <strong>See All Alerts</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li-->
      </ul>
    </nav>
  </div>
</div>

  <!-- /top navigation -->