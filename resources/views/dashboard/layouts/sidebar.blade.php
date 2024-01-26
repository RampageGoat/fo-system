<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse bg-body-tertiary">
  <div class="position-sticky pt-3 sidebar-sticky text-body-light">
    <ul class="nav flex-column fs-6">
      <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}" href="/dashboard" id="side">
            <i class="bi bi-graph-up-arrow"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('booking') ? 'active' : ''}}" href="/booking" id="side">
            <i class="bi bi-building"></i> Booking
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('rooms') ? 'active' : ''}}" href="/rooms" id="side">
            <i class="bi bi-house-door"></i> Rooms
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('report') ? 'active' : ''}}" href="/report" id="side">
            <i class="bi bi-clipboard-data"></i> Report
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('customers') ? 'active' : ''}}" href="/customers" id="side">
            <i class="bi bi-people"></i> Customers
          </a>
        </li>
      </ul>
    </div>
  </nav>