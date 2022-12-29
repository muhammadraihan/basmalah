@extends('layouts.basmalah')

@section('title')
    Basmalah Tour & Travel - Galeri
@endsection

@section('content')
<!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">Galeri</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item"><a href="#">Basmalah Travel</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Galeri</li>
                </ol>
            </nav>
        </div>
    </div>
<!-- Page Header End -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            @php
                $incrementNumber = 0
            @endphp
            <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card card-gallery">
                    <img src="{{ asset('/img/dummy-gallery.jpeg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Judul Event/Dokumentasi</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <span class="text-muted small mt-2">30 November 2022</span>
                    </div>
                  </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card card-gallery">
                    <img src="{{ asset('/img/dummy-gallery-2.jpeg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Judul Event/Dokumentasi</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <span class="text-muted small mt-2">30 November 2022</span>
                    </div>
                  </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card card-gallery">
                    <img src="{{ asset('/img/dummy-gallery-3.jpeg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Judul Event/Dokumentasi</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <span class="text-muted small mt-2">30 November 2022</span>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection