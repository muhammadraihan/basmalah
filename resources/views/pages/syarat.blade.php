@extends('layouts.basmalah')

@section('title')
    Basmalah Tour & Travel - Syarat & Ketentuan
@endsection

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white animated slideInRight">Syarat & Ketentuan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb animated slideInRight mb-0">
                <li class="breadcrumb-item"><a href="#">Basmalah Travel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Syarat & Ketentuan</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Features Start -->
<div id="background-white">
    <div class="container-xxl py-5">
        <div class="container">
            <section class="syarat-ketentuan">
                <div class="section-syarat">
                    <div class="h1">Syarat & Ketentuan
                    </div>
                @forelse ($syarat as $item)
                    <div class="h3">{{$item->kategoriSyarat->name}}</div>
                        <div id="detail" name="detail"> {!! $item->detail !!}</div>
                    </div>
                @empty
                    <div class="col-12">
                        Empty
                    </div>
                @endforelse
            </section>
        </div>
    </div>
</div>
<!-- Features End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
        class="bi bi-arrow-up"></i></a>    
@endsection