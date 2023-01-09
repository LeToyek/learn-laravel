<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ $title == 'Dashboard' ? 'active' : '' }}"  href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title == 'Events' ? 'active' : '' }}" href="/dashboard/events">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Events
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title == 'Tickets' ? 'active' : '' }}" href="/dashboard/tickets">
                    <span data-feather="credit-card" class="align-text-bottom"></span>
                    Tickets
                </a>
            </li>
        </ul>
    </div>
</nav>
