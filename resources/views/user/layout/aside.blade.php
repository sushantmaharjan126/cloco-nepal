<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="javascript::void(0)" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Rewa Soft</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <!-- Layouts -->
      <li class="menu-item">
        <a href="{{ url('/') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Visit Website</div>
        </a>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Site Management</span>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-notepad"></i>
          <div data-i18n="Account Settings">Pages</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-slideshow"></i>
          <div data-i18n="Authentications">Sliders</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-business"></i>
          <div data-i18n="Misc">Services</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link">
          <i class="menu-icon tf-icons bx bxl-blogger"></i>
          <div data-i18n="Misc">Blogs</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link">
          <i class="menu-icon tf-icons bx bx-images"></i>
          <div data-i18n="Misc">Gallery</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link">
          <i class="menu-icon tf-icons bx bx-message-alt-detail"></i>
          <div data-i18n="Misc">Testimonials</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link">
          <i class="menu-icon tf-icons bx bx-globe"></i>
          <div data-i18n="Misc">Why us?</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Misc">Our Teams</div>
        </a>
      </li>
      <!-- Components -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Inquiries and Queries</span></li>
      <!-- Cards -->
      <li class="menu-item">
        <a href="cards-basic.html" class="menu-link">
          <i class="menu-icon tf-icons bx bx-question-mark"></i>
          <div data-i18n="Basic">Inquries</div>
        </a>
      </li>

      <!-- Forms & Tables -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Users Management</span></li>
      <!-- Forms -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user-circle"></i>
          <div data-i18n="Form Elements">Admins</div>
        </a>
      </li>

      <!-- Misc -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Company Information</span></li>
      <li class="menu-item">
        <a
          href="{{ route('admin.setting.company') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-buildings"></i>
          <div data-i18n="Support">Company Information</div>
        </a>
      </li>

      <li class="menu-item">
        <a
          href="javascript::void(0)"
          class="menu-link"
        >
          <i class="menu-icon tf-icons bx bx-network-chart"></i>
          <div data-i18n="Documentation">Social Media</div>
        </a>
      </li>
      <li class="menu-item">
        <a
          href="javascript::void(0)"
          class="menu-link"
        >
          <i class="menu-icon tf-icons bx bx-sitemap"></i>
          <div data-i18n="Documentation">Site Information</div>
        </a>
      </li>

      <li class="menu-item">
        <a
          href="javascript::void(0)"
          class="menu-link"
        >
          <i class="menu-icon tf-icons bx bx-globe"></i>
          <div data-i18n="Documentation">SEO Information</div>
        </a>
      </li>
    </ul>
  </aside>