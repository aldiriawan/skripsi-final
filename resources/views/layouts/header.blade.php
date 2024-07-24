<header class="navbar navbar-expand-md navbar-dark sticky-top bg-dark shadow" data-bs-theme="dark" style="height: 50px;">
    <!-- Isi header Anda seperti biasa -->
    <a class="px-3 text-white text-decoration-none" href="/">FTI UKDW</a>
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
