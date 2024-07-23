<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">FTI UKDW</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <!-- Dashboard Section -->
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 text-decoration-none {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
                        <i class="bi bi-house-fill"></i>
                        <span class="text-sidebar">Dashboard</span>
                    </a>
                </li>
            </ul>
            <hr class="my-3">

            <!-- Daftar Data Section -->
            <div class="sidebar-heading">
                <span class="text-sidebar">Daftar Data</span>
            </div>
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dosen*') ? 'active' : '' }}" href="/dosen?dosen_id=1">
                        <i class="bi bi-person-fill"></i>
                        <span class="text-sidebar">Daftar Dosen</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('surattugas*') ? 'active' : '' }}" href="/surattugas">
                        <i class="bi bi-file-earmark-text"></i>
                        <span class="text-sidebar">Daftar Surat Tugas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('publikasi*') ? 'active' : '' }}" href="/publikasi">
                        <i class="bi bi-file-earmark-text"></i>
                        <span class="text-sidebar">Daftar Publikasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('suratketetapan*') ? 'active' : '' }}" href="/suratketetapan">
                        <i class="bi bi-file-earmark-text"></i>
                        <span class="text-sidebar">Daftar ST/SK</span>
                    </a>
                </li>
            </ul>
            <hr class="my-3">

            <!-- Administrasi Section -->
            <div class="sidebar-heading">
                <span class="text-sidebar">Administrasi</span>
            </div>
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dosen/show') ? 'active' : '' }}" href="{{ route('dosen.show') }}">
                        <i class="bi bi-gear-fill"></i>
                        <span class="text-sidebar">Data Dosen</span>
                    </a>
                </li>
                
                {{-- <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('administrasisurattugas') ? 'active' : '' }}" href="/administrasisurattugas">
                        <i class="bi bi-gear-fill"></i>
                        <span class="text-sidebar">Data Surat Tugas</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('administrasiuser') ? 'active' : '' }}" href="/user">
                        <i class="bi bi-gear-fill"></i>
                        <span class="text-sidebar">Data User</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<style>
    .text-sidebar {
        color: black;
        font-weight: normal;
    }

    .nav-link.active .text-sidebar {
        color: black;
        font-weight: bold; /* Highlight the active link */
    }

    .nav-link .text-sidebar {
        color: black; /* Ensure all text within nav-link has the same color */
    }

    .sidebar-heading {
        font-weight: bold;
        padding: 0.5rem 1rem;
    }

    .sidebar-heading .text-sidebar {
        color: black; /* Ensure the sidebar heading has the same color */
    }

    .nav-link i.bi {
        width: 1.5rem; /* Adjust the icon size as needed */
        height: 1.5rem; /* Adjust the icon size as needed */
        color: black; /* Set icon color to black */
    }
</style>
