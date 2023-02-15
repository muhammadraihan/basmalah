@extends('layouts.basmalah')

@section('title')
    Basmalah Tour & Travel | Paket {{$paket->namaPaket->name}}
@endsection

@section('content')
<!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-dark animated slideInRight">Paket {{$paket->namaPaket->name}}</h1>
            <nav aria-label="breadcrumb text-dark">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item"><a href="#">Basmalah Travel</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Paket</li>
                </ol>
            </nav>
        </div>
    </div>
<!-- Page Header End -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-12 col-lg-12">
                <img src="{{asset('photo/' . $paket->photo)}}" alt="Foto" class="w-100">
            </div>
        </div>
    </div>
</div>

<div id="menu">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-12 col-lg-12">
                    <h3 class="mb-4">Kategori: {{$paket->Kategori->name}}</h3>
                    <h5 class="mb-3">Nama Paket: {{$paket->NamaPaket->name}}</h5>
                    <h5 class="mb-3">Tanggal Keberangkatan: {{$paket->tanggal}}</h5>
                    <p class="mb-4">
                        <strong>Deskripsi Paket:</strong><br>
                        {{$paket->detail}}
                    </p>
                    <p class="mb-4">
                        <strong>Sudah Termasuk:</strong><br>
                        {!! $paket->include !!}
                    </p>
                    <p class="mb-4">
                        <strong>Belum Termasuk:</strong><br>
                        {!! $paket->exclude !!}
                    </p>
                    <p class="mb-4">
                        <strong>Akomodasi:<br></strong>
                        {{$paket->Hotel->name}}
                    </p>
                    <p class="mb-4">
                        <strong>Transportasi:<br></strong>
                        {{$paket->Transport->name}}
                    </p>
                    <h4 class="mt-2 mb-4">
                        Harga Paket:<br>
                        {{'Rp'.' '.number_format($paket->harga)}}
                    </h4>
                    <h5 class="mt-2 mb-4">
                        Status: @if ($paket->status == 0)
                            Tersedia
                        @else
                            Full Booked
                        @endif
                    </h5>
                    <a href="https://wa.me/6281350001996" class="btn btn-primary rounded btn-lg">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

