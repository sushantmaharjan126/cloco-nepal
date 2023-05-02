<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="javascript::void(0)" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item <?php if(Request::segment(2) == '') { echo 'active'; } ?>">
        <a href="{{ route('user.dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <!-- Layouts -->
      <li class="menu-item">
        <a href="{{ url('/') }}" target="_blank" class="menu-link">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Visit Website</div>
        </a>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Music Management</span>
      </li>
      <li class="menu-item <?php if(Request::segment(2) == 'users') { echo 'active'; } ?>">
        <a href="{{ route('user.users.get') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-user-circle"></i>
          <div data-i18n="Account Settings">Users</div>
        </a>
      </li>
      <li class="menu-item <?php if(Request::segment(2) == 'artists') { echo 'active'; } ?>">
        <a href="{{ route('user.artists.get') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-user"></i>
          <div data-i18n="Authentications">Artist</div>
        </a>
      </li>
      <li class="menu-item <?php if(Request::segment(2) == 'musics') { echo 'active'; } ?>">
        <a href="{{ route('user.musics.get') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-music"></i>
          <div data-i18n="Misc">Music</div>
        </a>
      </li>
    </ul>
  </aside>