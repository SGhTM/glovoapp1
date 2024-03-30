  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Maroc 2024</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href=""></a>
        </div> --}}
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('catalogues.index')}}" class="nav-link {{ Request::is('catalogues*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Catalogues</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('shops.index')}}" class="nav-link {{ Request::is('shops*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Shops</p>
                </a>
            </li>
              <li class="nav-item">
                <a href="{{route('menus.index')}}" class="nav-link {{ Request::is('menus*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('utilisateurs.index')}}" class="nav-link {{ Request::is('utilisateurs*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('paniers.index')}}" class="nav-link  {{ Request::is('paniers*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paniers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('details.index')}}" class="nav-link {{ Request::is('details*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Detail_bon livraison</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('modes.index')}}" class="nav-link {{ Request::is('modes*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon "></i>
                  <p>mode de reglements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('reglements.index')}}" class="nav-link {{ Request::is('reglements*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon "></i>
                  <p>reglements</p>
                </a>
              </li>

            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>