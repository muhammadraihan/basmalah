@extends('layouts.basmalah')

@section('title')
    Basmalah Tour & Travel
@endsection

@section('content')
    <!-- Carousel Start -->
<div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @forelse ($home as $key => $item)
            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                <img class="w-100" src="{{asset('photo/' . $item->photo)}}" alt="Image">
            </div>
            @empty
                <div class="col-12">
                    Empty
                </div>
            @endforelse
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
        <div class="container">
            <div class="row gy-5 gx-4">
                @php
                    $incrementNumber = 0
                @endphp
                @forelse ($paket as $item)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="{{$incrementNumber += 100}}">
                    <div class="card-basmalah border-0 me-lg-4 mb-lg-0 mb-4">
                        <div class="backgroundEffect"></div>
                        <div class="pic"> <img class=""
                                src="{{ asset('photo/' . $item->photo) }}"
                                alt="">
                            <div class="date"> <span class="day">{{$item->hari}} hari</span></div>
                        </div>
                        <div class="content">
                            <p class="h3 mt-4">{{$item->nama}}</p>
                            <p class="h-1 mt-2 text-uppercase">{{$item->jenis_paket}}</p>
                            <p class="text-muted mt-3">Far far away, behind the word mountains,
                                far from the countries Vokalia
                                and Consonantia, there live the blind texts.</p>
                            <div class="d-flex align-items-center justify-content-between mt-3 pb-3">
                                <div class="btn btn-primary">Lihat Detil<span class="fas fa-arrow-right"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-12">
                        Empty
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

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
            @forelse ($hotel as $item)
            <div class="col-12 col-md-3">
                <div class="img-grid">
                    <img src="{{ asset('photo/' . $item->photo)}}" alt="hotel">
                    <div class="my-4 title-hotel">{{$item->name}}</div>
                    @for($i = 0; $i < $item->grade; $i++)
                        <div class="my-2">&#11088;</div>
                    @endfor
                    <div class="my-3">{{$item->location}}</div>
                </div>
            </div>
            @empty
                <div class="col-12">
                    Empty
                </div>
            @endforelse
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
            @forelse ($transport as $item)
            <div class="item">
                <img src="{{asset('photo/' . $item->photo)}}" alt="Image">
            </div>
            @empty
                <div class="col-12">
                    Empty
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Project End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
        class="bi bi-arrow-up"></i></a>    
@endsection