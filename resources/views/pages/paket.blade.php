@extends('layouts.basmalah')

@section('title')
    Basmalah Tour & Travel - Paket {{$paket->name}}
@endsection

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">Paket {{$paket->name}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item"><a href="#">Basmalah Travel</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Paket {{$paket->name}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Project Start -->
    <div class="container-fluid py-5 my-5 px-0">
        <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-5 mb-5">Paket {{$paket->name}}</h1>
        </div>
        <div class="container">
            <div class="row gy-5 gx-4">
                @php
                    $incrementNumber = 0
                @endphp
                @forelse ($result as $item)
                <div class="col-md-6 col-lg-6 wow fadeInUp" data-wow-delay="{{$incrementNumber += 100}}">
                    <div class="card-basmalah border-0 me-lg-4 mb-lg-0 mb-4">
                        <div class="backgroundEffect"></div>
                        <div class="pic"> <img class=""
                                src="{{ asset('photo/' . $item->photo) }}"
                                alt="">
                            <div class="date"> <span class="day">{{$item->hari}} hari</span></div>
                        </div>
                        <div class="content">
                            <p class="h3 mt-4">{{$item->NamaPaket->name}}</p>
                            <p class="h-1 mt-2 text-uppercase">{{$item->Kategori->name}}</p>
                            <p class="mt-3 h5">{{'Mulai Rp.'.' '.number_format($item->harga)}}</p>
                            <div class="d-flex align-items-center justify-content-between mt-3 pb-3">
                                <a href="{{ route('detail', $item->uuid)}}" class="btn btn-primary">Lihat Detil<span class="fas fa-arrow-right"></span></a>
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
    <!-- Project End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
        class="bi bi-arrow-up"></i></a>    
@endsection