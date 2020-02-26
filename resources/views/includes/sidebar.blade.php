<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>

        <li><a href="#" class="nav-link"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>

        {{-- menu product --}}
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box-open"></i> <span>Product</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('product.create') }}">Tambah Product</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Daftar Product</a></li>
          </ul>
        </li>

        {{-- menu store --}}
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-store"></i> <span>Store</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('store.create') }}">Tambah Store</a></li>
            <li><a class="nav-link" href="{{ route('store.list') }}">Daftar Store</a></li>
            </ul>
        </li>



        
      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>        </aside>
  </div>