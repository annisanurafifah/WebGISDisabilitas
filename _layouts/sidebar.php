  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=url('beranda')?>" class="brand-link">
      <span class="brand-text font-weight-light"><b>WebGIS Disabilitas</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=url('beranda')?>" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Beranda                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=url('spiderchart')?>" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Spider Chart             
              </p>
            </a>
          </li>
          <?php if ($session->get('level')=='admin'): ?>
          <li class="nav-item">
            <a href="<?=url('table')?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Table
              </p>
              <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=url('disabilitas')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Disabilitas</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=url('sarpras-sekolah')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sekolah</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=url('sarpras-kesehatan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kesehatan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=url('sarpras-transportasi')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transportasi</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=url('kecamatan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kecamatan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?=url('leaflet-control')?>" class="nav-link">
              <i class="nav-icon fas fa-map marker"></i>
              <p>
                Map - Admin                
              </p>
            </a>
          </li>
          <?php endif ?>
          <?php if ($session->get('level')=='user'): ?>
          <li class="nav-item">
            <a href="<?=url('leaflet-controluser')?>" class="nav-link">
              <i class="nav-icon fas fa-map marker"></i>
              <p>
                Map - User                
              </p>
            </a>
          </li>
          <?php endif ?>
          <li class="nav-item">
            <a href="<?=url('logout')?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log out             
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>