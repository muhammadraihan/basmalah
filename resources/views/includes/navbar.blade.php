<!-- Topbar Start -->
{{-- <div class="container-fluid bg-dark px-0">
    <div class="row g-0 d-none d-lg-flex">
        <div class="col-lg-6 ps-5 text-start">
            <div class="h-100 d-inline-flex align-items-center text-white">
                <span>Follow Us:</span>
                <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-6 text-end">
            <div class="h-100 topbar-right d-inline-flex align-items-center text-white py-2 px-5">
                <span class="fs-5 fw-bold me-2"><i class="fa fa-phone-alt me-2"></i>Call Us:</span>
                <span class="fs-5 fw-bold">+012 345 6789</span>
            </div>
        </div>
    </div>
</div> --}}
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top py-2 pe-5 bg-basmalah" style="background: url('img/elements_header_background.png'),linear-gradient(to right,rgb(172,28,48),rgb(255,196,13)) !important;">
    <a href="index.html" class="navbar-brand ps-5 me-0">
        <img src="img/logo/Master Logo Vector-8.png" alt="Logo" height="48">
    </a>
    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : ''}}">Beranda</a>
            <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->is('about') ? 'active' : ''}}">Tentang Kami</a>
            <a href="{{ route('umrah') }}" class="nav-item nav-link {{ request()->is('umrah') ? 'active' : ''}}">Paket Umrah</a>
            <a href="{{ route('haji') }}" class="nav-item nav-link {{ request()->is('haji') ? 'active' : ''}}">Paket Haji</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="fasilitas.html" class="dropdown-item">Fasilitas</a>
                    <a href="gallery.html" class="dropdown-item">Gallery</a>
                    <a href="download.html" class="dropdown-item">Download</a>
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">Kontak</a>
        </div>
    </div>
</nav>
<!-- Navbar End -->