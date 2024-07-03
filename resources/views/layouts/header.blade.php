<header class="navbar navbar-expand-md navbar-dark sticky-top bg-dark shadow" data-bs-theme="dark" style="height: 50px;">
    <!-- Isi header Anda seperti biasa -->
    <a class="px-3 text-white text-decoration-none" href="/">FTI UKDW</a>

    {{-- <div class="col-md-4">
        <form action="/dosen" method="get" class="d-flex">
            <input type="text" class="form-control me-2" placeholder="Search.." name="search" value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </form>
    </div> --}}

    <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                </li>
            </ul>
        </li>
        @endauth
    </ul>
</header>
