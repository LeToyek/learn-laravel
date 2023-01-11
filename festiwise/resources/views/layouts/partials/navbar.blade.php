<nav class="navbar navbar-dark navbar-expand-lg main-nav">
    @if ($title == 'home')
        <style>
            @media (min-width: 1200px) {
                .main-nav {
                    background-color: transparent;
                    width: 100vw;
                    position: absolute;
                }
            }
        </style>
    @endif
    <div class="container">
        <a class="navbar-brand" href="../"><span class="title nav-title">Festiwise</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"></ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'home' ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'events' ? 'active' : '' }}" href="/events">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'calendar' ? 'active' : '' }}" href="/calendar">Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'category' ? 'active' : '' }}" href="/category">Category</a>
                </li>

            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">{{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i>
                                    My Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i>
                                        Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary px-5 {{ $title == 'Login' ? 'active' : '' }}" href="/login"
                            style="border-radius: 32px">
                            <span data-feather="log-in" style="width: 16px"></span>
                            Login</a>
                    </li>

                @endauth
            </ul>

        </div>
    </div>
</nav>
