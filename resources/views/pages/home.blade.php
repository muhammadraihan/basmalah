@extends('layouts.basmalah')

@section('title')
    Basmalah Tour & Travel
@endsection

@section('content')
    <!-- Carousel Start -->
<div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/hero/hero-1.jpeg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-start">
                                <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">Paket
                                    Tur Umrah Untuk Keluarga</p>
                                <h1 class="display-1 text-white mb-5 animated slideInRight">Bahagia Sukses Mulia
                                    Bersama Allah</h1>
                                <a href="" class="btn btn-primary py-3 px-5 animated slideInRight">Lihat detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/hero/hero-2.avif" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-start">
                                <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">Paket
                                    Tur Sampai Ke Turki</p>
                                <h1 class="display-1 text-white mb-5 animated slideInRight">Cukup Rp10juta Sudah
                                    Bisa Beribadah</h1>
                                <a href="" class="btn btn-primary py-3 px-5 animated slideInRight">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="row gx-3 h-100">
                    <div class="col-6 align-self-start wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid" src="img/about/1.jpeg">
                    </div>
                    <div class="col-6 align-self-end wow fadeInDown" data-wow-delay="0.1s">
                        <img class="img-fluid" src="img/about/2.avif">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="fw-medium text-uppercase text-primary mb-2">Tentang Basmalah Travel</p>
                <h1 class="display-5 mb-4">Agen Tur & Travel Umrah Terpercaya</h1>
                <p class="mb-4">Basmalah Berkah Mulia yang bertujuan untuk mencari keberkahan dengan mengantarkan
                    tamu - tamu Allah yang Mulia ke Baitullah untuk melaksanakan Ibadah Haji dan Umrah.
                </p>
                <p class="mb-4">
                    Kami menyediakan berbagai macam program dan paket Umrah serta Haji dengan memberikan pelayanan
                    dan fasilitas yang terbaik serta harga yang kompetitif.
                </p>
                <div class="row pt-2">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle basmalah-primary">
                                <i class="fa fa-envelope-open text-white"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-2">Email</p>
                                <p class="mb-0 kontak-desc">kontak@basmalahtravel.co.id</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle basmalah-primary">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-2">Telepon</p>
                                <p class="mb-0 kontak-desc">+012 345 6789</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Paket Tur Umrah</p>
            <h1 class="display-5 mb-4">Pilihan Paket Umrah Untuk Kamu</h1>
        </div>
        <div class="row gy-5 gx-4">
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <img class="img-fluid" src="img/paket/madinah.jpeg" alt="">
                    <div class="service-img">
                        <img class="img-fluid" src="img/paket/madinah.jpeg" alt="">
                    </div>
                    <div class="service-detail">
                        <div class="service-title">
                            <p class="mb-0 text-primary">Paket Umrah <span class="badge bg-info">12hari</span></p>
                            <hr class="w-25">
                            <h3 class="mb-2">Berkah</h3>
                            <p class="mb-0 text-secondary">Mulai dari Rp 30juta</p>
                            <hr class="w-25">
                        </div>
                        <div class="service-text">
                            <p class="text-white mb-0">Madinah | Harga Sudah Termasuk Perlengkapan</p>
                        </div>
                    </div>
                    <a class="btn btn-light" href="">Beli Paket</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item">
                    <img class="img-fluid" src="img/paket/madinah.jpeg" alt="">
                    <div class="service-img">
                        <img class="img-fluid" src="img/paket/madinah.jpeg" alt="">
                    </div>
                    <div class="service-detail">
                        <div class="service-title">
                            <p class="mb-0 text-primary">Paket Halal Tour <span class="badge bg-info">12hari</span>
                            </p>
                            <hr class="w-25">
                            <h3 class="mb-2">Turkey Tour</h3>
                            <p class="mb-0 text-secondary">Mulai dari Rp 17,8juta</p>
                            <hr class="w-25">
                        </div>
                        <div class="service-text">
                            <p class="text-white mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                                lorem sed diam stet diam sed stet.</p>
                        </div>
                    </div>
                    <a class="btn btn-light" href="">Read More</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item">
                    <img class="img-fluid" src="img/paket/madinah.jpeg" alt="">
                    <div class="service-img">
                        <img class="img-fluid" src="img/paket/madinah.jpeg" alt="">
                    </div>
                    <div class="service-detail">
                        <div class="service-title">
                            <p class="mb-0 text-primary">Paket Napak Tilas <span class="badge bg-info">2
                                    negara</span></p>
                            <hr class="w-25">
                            <h3 class="mb-2">Bumi Para Nabi</h3>
                            <p class="mb-0 text-secondary">Mulai dari USD 2750</p>
                            <hr class="w-25">
                        </div>
                        <div class="service-text">
                            <p class="text-white mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                                lorem sed diam stet diam sed stet.</p>
                        </div>
                    </div>
                    <a class="btn btn-light" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<div class="container">

    <!--Product Grid-->
    <div id="div1">
        <section class="section-paket2">
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="prod-grid"><img src="img/paket/madinah.jpeg" alt="Madinah">
                        <div class="my-2 title-paket">Paket Umrah
                            <span class="badge bg-info">12hari</span></div>
                        <h3 class="nama-paket">Berkah</h3>
                        <div class="price-paket">Mulai <span>Rp 30juta</span></div>
                        <p class="short-desc">Tour Madinah, Harga sudah termasuk perlengkapan</p>
                        <button class="btn w-100 btn-test">Beli Paket <i class="fa fa-shopping-cart"
                                aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="prod-grid"><img src="img/paket/madinah.jpeg" alt="Madinah">
                        <div class="my-2 title-paket">Paket Umrah
                            <span class="badge bg-info">12hari</span></div>
                        <h3 class="nama-paket">Berkah</h3>
                        <div class="price-paket">Mulai <span>Rp 30juta</span></div>
                        <p class="short-desc">Tour Madinah, Harga sudah termasuk perlengkapan</p>
                        <button class="btn w-100 btn-test">Beli Paket <i class="fa fa-shopping-cart"
                                aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="prod-grid"><img src="img/paket/madinah.jpeg" alt="Madinah">
                        <div class="my-2 title-paket">Paket Umrah
                            <span class="badge bg-info">12hari</span></div>
                        <h3 class="nama-paket">Berkah</h3>
                        <div class="price-paket">Mulai <span>Rp 30juta</span></div>
                        <p class="short-desc">Tour Madinah, Harga sudah termasuk perlengkapan</p>
                        <button class="btn w-100 btn-test">Beli Paket <i class="fa fa-shopping-cart"
                                aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Project Start -->
<div class="container-fluid py-4 my-5 px-0  bg-dark">
    <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2">Akomodasi Yang Disediakan</p>
        <h1 class="display-5 text-white mb-5">Akomodasi Bintang 3</h1>
    </div>
</div>

<section class="akomodasi-section">
    <div class="container my-4">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="img-grid">
                    <img src="img/akomodasi/3-istanbul.jpeg" alt="hotel">
                    <div class="my-4 title-hotel">Hotel Istanbul</div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="img-grid">
                    <img src="img/akomodasi/3-istanbul.jpeg" alt="hotel">
                    <div class="my-4 title-hotel">Hotel Istanbul</div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="img-grid">
                    <img src="img/akomodasi/3-istanbul.jpeg" alt="hotel">
                    <div class="my-4 title-hotel">Hotel Istanbul</div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="img-grid">
                    <img src="img/akomodasi/3-istanbul.jpeg" alt="hotel">
                    <div class="my-4 title-hotel">Hotel Istanbul</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Project End -->

<!-- Project Start -->
<div class="container-fluid py-4 my-5 px-0  bg-dark">
    <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2">Akomodasi Yang Disediakan</p>
        <h1 class="display-5 text-white mb-5">Transportasi</h1>
    </div>
</div>

<section class="transportasi-section">
    <div class="container my-4">
        <div class="owl-carousel transport-carousel">
            <div class="item">
                <img src="img/transport/Picture1.png/Picture1.png-1.png" alt="Image">
            </div>
            <div class="item">
                <img src="img/transport/Picture1.png/Picture1.png-2.png" alt="Image">
            </div>
            <div class="item">
                <img src="img/transport/Picture1.png/Picture1.png-3.png" alt="Image">
            </div>
            <div class="item">
                <img src="img/transport/Picture1.png/Picture1.png/Picture1.png-1.png" alt="Image">
            </div>
            <div class="item">
                <img src="img/transport/Picture1.png/Picture1.png/Picture1.png-2.png" alt="Image">
            </div>
        </div>
    </div>
</section>
<!-- Project End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
        class="bi bi-arrow-up"></i></a>    
@endsection