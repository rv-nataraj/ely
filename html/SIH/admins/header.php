<nav class="navbar navbar-expand navbar-light static-top" style="background-color: #666666">

<a class="navbar-brand  mr-1 text-white font-weight-bold" href="admin.php"><img src="img/1.png" width="40" height="40" class="img-rounded" alt="">ADMIN</img></a>

<button class="btn btn-link btn-sm text-white order-1 order-sm-0 fa-lg" id="sidebarToggle" href="#" onclick="openNav()">
  <i class="fas fa-bars" ></i>
</button>

<!-- Navbar Search -->
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0 ">
  <div class="input-group">
    
    <div class="input-group-append">
      
        <i class="fas fa-search"></i>
      </button>
    </div>
  </div>
</form>

<!-- Navbar -->
<ul class="navbar-nav ml-auto ml-md-0 ">
  <li class="nav-item dropdown no-arrow fa-lg mx-1">
    <a class="nav-link dropdown-toggle " href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-bell fa-fw" style="color:#f2f2f2;"></i>
      <span class="badge badge-danger">9+</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right text-white btn" aria-labelledby="alertsDropdown">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Something else here</a>
    </div>
  </li>
  
  <li class="nav-item dropdown no-arrow fa-lg ">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user-circle fa-fw" style="color:#f2f2f2;"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

    <a class="dropdown-item" href="admin_profile.php">Profile</a><br>
      <a class="dropdown-item" href="admin_pwd.php">password change</a>
      
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
    </div>
  </li>
</ul>

</nav>
