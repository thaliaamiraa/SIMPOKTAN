  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <h1>SIMPOKTAN</h1>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        
        <ul class="navbar-nav navbar-nav-right">
         
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="<?= site_url('C_login/logout') ?>">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="<?= base_url() ?>assets/images/faces/simpoktan.png" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">ADMIN</span>
                <span class="text-secondary text-small"><?= $this->session->userdata('username');?></span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= site_url() ?>c_login/dashboard">
              <span class="menu-title">DASHBOARD</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url() ?>c_kecamatan/">
              <span class="menu-title">KECAMATAN</span>
              <i class="mdi mdi-home-modern menu-icon"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= site_url() ?>c_desa/">
              <span class="menu-title">DESA</span>
              <i class="mdi mdi-image-filter-hdr menu-icon"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= site_url() ?>c_hasilpertanian/">
              <span class="menu-title">HASIL PERTANIAN</span>
              <i class="mdi mdi-barley menu-icon"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= site_url() ?>c_klasterisasi/">
              <span class="menu-title">KLASTERISASI</span>
              <i class="mdi mdi-chart-scatterplot-hexbin menu-icon"></i>
            </a>
          </li>


        </ul>
      </nav>