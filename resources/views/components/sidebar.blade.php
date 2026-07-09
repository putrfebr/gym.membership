<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="home" class="logo">
        <img src="{{ asset('template') }}/assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
          height="20" />
      </a>
      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
          <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
          <i class="gg-menu-left"></i>
        </button>
      </div>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>
    <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
        <li class="nav-item">
          <a href="/home">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
          <li class="nav-item">
            <a href="/member">
            <i class="fas fa-users"></i>
            <p>Members</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/membership">
            <i class="fas fa-book"></i>
            <p>Membership</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/invoice">
            <i class="fas fa-file-invoice"></i>
            <p>Invoice</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/payment">
            <i class="fas fa-money-check-alt"></i>
            <p>Payment</p>
          </a>
        </li>



      </ul>
    </div>
  </div>
</div>