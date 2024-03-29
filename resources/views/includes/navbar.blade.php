<!-- Topbar Start -->
<div class="container-fluid bg-dark px-0">
    <div class="row g-0 d-none d-lg-flex">
        <div class="col-lg-6 ps-5 text-start">
            <div class="h-100 d-inline-flex align-items-center text-white">
                <span>Sosial Media:</span>
                <a class="btn btn-link text-light" href="https://www.facebook.com/basmalahtravel" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-link text-light" href="https://www.instagram.com/basmalah_travel/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-6 text-end">
            <div class="h-100 topbar-right d-inline-flex align-items-center text-white py-2 px-5">
                <span class="fs-8 fw-bold me-2"><i class="fa fa-phone-alt me-2"></i>Hubungi Kami:</span>
                <span class="fs-8 fw-bold">+62 813 5000 1996</span>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top py-2 pe-3 bg-basmalah" style="background: url('/img/elements_header_background.png'),linear-gradient(to right,rgb(172,28,48),rgb(255,196,13)) !important;">
    <a href="{{route('home')}}" class="navbar-brand ps-2 me-0">
        <img src="/img/logo/Master Logo Vector-8.png" alt="Logo" height="48">
    </a>
    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : ''}}">Beranda</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tentang Kami</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ route('about') }}" class="dropdown-item">Tentang Basmalah</a>
                    <a href="{{ route('syarat') }}" class="dropdown-item">Syarat & Ketentuan</a>
                </div>
            </div>
            {{-- <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->is('about') ? 'active' : ''}}">Tentang Kami</a> --}}
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pilihan Paket</a>
                <div class="dropdown-menu bg-light m-0">
                    @foreach ($kategori as $item)
                    <a href="{{ route('paket', $item->uuid)}}" class="dropdown-item">{{$item->name}}</a>
                    @endforeach
                    {{-- <a href="download.html" class="dropdown-item">Paket Haji</a> --}}
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ route('gallery') }}" class="dropdown-item">Galeri</a>
                    <a href="{{ route('download') }}" class="dropdown-item">Download</a>
                </div>
            </div>
            <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->is('/contact') ? 'active' : ''}}">Kontak</a>
        </div>
    </div>
</nav>
<!-- Navbar End -->