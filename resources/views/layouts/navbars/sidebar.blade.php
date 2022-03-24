<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a class="simple-text logo-normal">
      {{ __('Đại lý HonDa') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}" {{Auth::guard('admin')->user()->role == 2 ? 'hidden' : ''}}>
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      {{-- <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li> --}}
      <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <i class="material-icons">account_circle</i>
            <p>{{ __('Profile') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'calendar' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('calendar') }}">
          <i class="material-icons">library_books
          </i>
            <p>{{ __('Phân công') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'admin' ? ' active' : '' }}" {{Auth::guard('admin')->user()->role != 1 ? 'hidden' : ''}}>
        <a class="nav-link" href="{{ route('admin') }}">
          <i class="material-icons">admin_panel_settings
          </i>
            <p>{{ __('Admin') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'customer' ? ' active' : '' }}" {{Auth::guard('admin')->user()->role == 2 ? 'hidden' : ''}}>
        <a class="nav-link" href="{{ route('customer') }}">
          <i class="material-icons">account_circle</i>
            <p>{{ __('Customer') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}" {{Auth::guard('admin')->user()->role == 2 ? 'hidden' : ''}}>
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">warehouse</i>
            <p>{{ __('Kho hàng') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'product' ? ' active' : '' }}" {{Auth::guard('admin')->user()->role == 2 ? 'hidden' : ''}}>
        <a class="nav-link" href="{{ route('product') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Sản phẩm') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'productdetail' ? ' active' : '' }}" {{Auth::guard('admin')->user()->role == 2 ? 'hidden' : ''}}>
        <a class="nav-link" href="{{ route('productdetail') }}">
          <i class="material-icons">assignment</i>
          <p>{{ __('Sản phẩm chi tiết') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'order' ? ' active' : '' }}" {{Auth::guard('admin')->user()->role == 2 ? 'hidden' : ''}}>
        <a class="nav-link" href="{{ route('order') }}">
          <i class="material-icons">receipt</i>
            <p>{{ __('Hóa đơn') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'orderdetail' ? ' active' : '' }}" {{Auth::guard('admin')->user()->role == 2 ? 'hidden' : ''}}>
        <a class="nav-link" href="{{ route('orderdetail') }}">
          <i class="material-icons">description</i>
          <p>{{ __('Hóa đơn chi tiết') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'supplier' ? ' active' : '' }}" {{Auth::guard('admin')->user()->role == 2 ? 'hidden' : ''}}>
        <a class="nav-link" href="{{ route('supplier') }}">
          <i class="material-icons">group</i>
          <p>{{ __('Nhà cung cấp') }}</p>
        </a>
      </li>
      {{-- <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link text-white bg-danger" href="{{ route('upgrade') }}">
          <i class="material-icons text-white">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li> --}}
    </ul>
  </div>
</div>
