@extends('layouts.basmalah')

@section('title')
    Basmalah Tour & Travel - Download
@endsection

@section('content')
<!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">Download</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item"><a href="#">Basmalah Travel</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Download</li>
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
            @forelse ($download as $item)
            <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay="{{$incrementNumber += 100}}">
                <div class="card card-gallery">
                    <img src="{{ asset('photo/' . $item->photo) }}" class="card-img-top" alt="Image">
                    <div class="card-body">
                      <span class="text-muted small">{{$item->tanggal}}</span>
                      <h5 class="card-title mb-4">{{$item->judul}}</h5>
                      <a href="{{$item->link}}" target="_blank" class="btn btn-basmalah">Download via Google Drive</a>
                    </div>
                  </div>
            </div>
            @empty
                
            @endforelse
        </div>
    </div>
</div>
@endsection