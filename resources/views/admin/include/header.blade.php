
 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{URL::to('/')}}" class="navbar-brand">
        <img src="{{ URL::asset('admin/dist/img/logo2.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-2"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Universitas Universal</span>
      </a>

      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          @if(Auth::user()->level == "1")
          @else
          <li class="nav-item">
            <a href="{{URL::to('/pemohon')}}" class="nav-link"><i class="fa fa-user-friends"></i> Pelamar</a>
          </li>
          @endif
          
          <!--li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-cogs"></i> Setup</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{URL::to('/user')}}" class="dropdown-item">User</a></li>
              <li><a href="#" class="dropdown-item">Some other action</a></li>

              <li class="dropdown-divider"></li>

              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                  </li>

                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                    </ul>
                  </li>

                  <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li>
            </ul>
          </li-->
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!--li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-danger navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li-->

          <!-- Right navbar links -->
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            @csrf
            <i class="fa fa-sign-out-alt"></i>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>

        
    </div>
  </nav>
    <div class="progress-container"style="position: fixed;">
        <div class="progress-bar" id="myBar" ></div>
    </div> 
<style>

.progress-container {
  width: 5%;
  height: 8px;
  background: #ccc;
}

.progress-bar {
  height: 8px;
  background: #436cc2;
  width: 0%;
}

</style>
<script type="text/javascript">
// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}

</script>
  <!-- /.navbar -->