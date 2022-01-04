  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @if (Auth::guard()->user())
        <div class="image">
          <img src="{{ asset('storage/avatars/'. Auth::guard()->user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{ Auth::guard()->user()->name }}
          </a>
        </div>
        @endif
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard.show') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('product.index') }}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tag.index') }}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Tags
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="" class="nav-link">
                <li><a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="icon_clock_alt"></i> Logout</a></li>
                <form id="frm-logout" action="{{ route('logout.logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
                </a>
              </li>
        </ul>
        </li>
        <li class="nav-item" style="margin-bottom: 20px;">

        </li>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </aside>