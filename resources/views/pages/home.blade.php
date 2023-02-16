@extends('layouts.basmalah')

@section('title')
    Basmalah Tour & Travel
@endsection

@section('content')
<!-- Carousel Start -->
<div class="container-fluid px-0 mb-5">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
            @forelse ($home as $key => $item)
            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                <img src="{{asset('photo/' . $item->photo)}}" class="d-block w-100" alt="Picture">
            </div>
            @empty
                <div class="col-12">
                    Empty
                </div>
            @endforelse
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div>
<!-- Carousel End -->


<!-- About Start -->
<div id="about-me">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="gx-3 h-100">
                        <div class="align-self-start wow fadeInUp" data-wow-delay="0.1s">
                            <img class="img-fluid" src="{{ asset('/photo/' . $about->photo) }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="fw-medium text-uppercase text-primary mb-2">Tentang Basmalah Travel</p>
                    <h1 class="display-5 mb-4">Agen Tur & Travel Umrah Terpercaya</h1>
                    <p class="mb-4">{{$about->keterangan}}
                    </p>
                    <div class="row pt-2">
                        <div class="col-sm-6 mb-4">
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
</div>
<!-- About End -->

{{-- Menu --}}
<div id="menu">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Pilihan Paket Untukmu</p>
                <h1 class="display-5 mb-4">Mau Melakukan Perjalanan Kemana?</h1>
            </div>
            <div class="container">
                <div class="row gy-5 gx-3">
                    {{-- Jadi Button --}}
                    @php
                        $incrementNumber = 0
                    @endphp
                    @forelse ($kategori as $item)
                    <div class="col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="{{$incrementNumber += 100}}">
                        <a href="{{ route('paket', $item->uuid) }}">
                            <div class="example brighten">
                                <img src="{{ asset('/img/jenis_paket.jpeg')}}" />
                                <p>{{$item->name}}</p>	
                            </div>
                        </a>
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
</div>
{{-- Menu End --}}

<!-- Service Start -->
<div id="paket">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Paket Tur Basmalah</p>
                <h1 class="display-5 mb-4">Pilihan Paket Tour Untuk Kamu</h1>
            </div>
            <div class="container">
                <div class="row gy-5 gx-4">
                    @php
                        $incrementNumber = 0
                    @endphp
                    @forelse ($paket as $item)
                    <div class="col-md-6 col-lg-6 wow fadeInUp mb-2" data-wow-delay="{{$incrementNumber += 100}}">
                        <div class="card-basmalah border-0 me-lg-4 mb-lg-0 mb-4">
                            <div class="backgroundEffect"></div>
                            <div class="pic"> <img class=""
                                    src="{{ asset('photo/' . $item->photo) }}"
                                    alt="">
                                <div class="date"> <span class="day">{{$item->hari}} hari</span></div>
                            </div>
                            <div class="content">
                                <p class="h3 mt-4">{{$item->NamaPaket->name}}</p>
                                <p class="h-1 mt-2">Jenis Perjalanan: <span class="text-uppercase">{{$item->Kategori->name}}</span></p>
                                <p class="mt-3 h5">{{'Mulai Rp.'.' '.number_format($item->harga)}}</p>
                                <div class="d-flex align-items-center justify-content-between mt-3 pb-3">
                                    <a href="{{ route('detail', $item->uuid)}}" class="btn btn-primary">Lihat Detail<span class="fas fa-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-12">
                            <div class="empty_state">
                                <i class="fa-light fa-glass-empty"></i>
                                <h3 class="">Belum Ada Paket Tersedia</h3>
                                <p>Hubungi Kami Untuk Lebih Lanjut</p>
                                <button>Hubungi Kami</button>
                              </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<!-- Project Start -->
<div id="hotel">
    <div class="container-fluid py-4 my-5 px-0">
        <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase mb-2 h1">Hotel yang disediakan</p>
        </div>
    </div>
    
    <section class="akomodasi-section">
        <div class="container my-4">
            <div class="row">
                @php
                    $incrementNumber = 0
                @endphp
                @forelse ($hotel as $item)
                <div class="col-12 col-md-3 mb-4 wow fadeInUp" data-wow-delay="{{$incrementNumber += 100}}">
                    <div class="card-akomodasi">
                        <div class="card">
                            <img src="{{ asset('/photo/' . $item->photo)}}" alt="hotel" class="card-img-top" alt="Akomodasi">
                            <div class="card-body">
                              <h5 class="card-title">{{$item->name}}</h5>
                              <p class="card-text">{{$item->location}}</p>
                                <div class="d-flex mb-4">
                                    @for($i = 0; $i < $item->grade; $i++)
                                        <div class="mx-2">&#11088;</div>
                                    @endfor
                                </div>
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
    </section>
</div>
<!-- Project End -->

<!-- Project Start -->
<div id="transport">
    <div class="container-fluid py-4 my-5 px-0">
        <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase mb-2 h1">Transportasi</p>
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
</div>
<!-- Project End -->

<!-- Features Start -->
<div id="video">
    <div class="container-fluid py-4 my-5 px-0">
        <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase mb-2 h1">Video Basmalah Travel</p>
            
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="position-relative me-lg-4">
                            <iframe class="embed-responsive-item" title="Media Basmalah" src="https://www.youtube.com/embed/{{$youtube->link}}" id="video"
                                allowscriptaccess="always"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media;
                                gyroscope; picture-in-picture; web-share"
                                width="500"
                                height="500"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <p class="fw-medium text-uppercase text-primary mb-2">MEDIA BASMALAH</p>
                        <h3 class="mb-4 text-capitalize">{{$youtube->name}}</h3>
                        <p class="mb-4">{{$youtube->keterangan}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</div>
<!-- Features End -->

<!-- Testi -->
<div id="testimonial">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Testimonial</p>
                <h1 class="display-5 mb-5">Jemaah Basmalah Berkata</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @forelse ($testimoni as $item)
                <div class="testimonial-item text-center">
                    <div class="testimonial-img position-relative">
                        <img class="img-fluid rounded-circle mx-auto mb-5" src="{{asset('photo/' . $item->video)}}">
                        <div class="btn-square bg-primary rounded-circle">
                            <i class="fa fa-quote-left text-white"></i>
                        </div>
                    </div>
                    <div class="testimonial-text text-center rounded p-4">
                        <p>{{$item->judul}}</p>
                        <h5 class="mb-1">{{$item->nama_jemaah}}, {{$item->umur}} tahun</h5>
                        <span class="fst-italic">Jemaah {{$item->nama_paket}}, Keberangkatan {{$item->tanggal}}</span>
                        <div class="d-flex my-2 align-items-center justify-content-center">
                            <div class="mx-2">&#11088;</div>
                            <div class="mx-2">&#11088;</div>
                            <div class="mx-2">&#11088;</div>
                            <div class="mx-2">&#11088;</div>
                            <div class="mx-2">&#11088;</div>
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
<!-- Testi End -->


<!-- Video Modal Start -->
<div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" title="Media Basmalah" src="https://www.youtube.com/embed/{{$youtube->link}}" id="video"
                        allowscriptaccess="always"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media;
                        gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
        class="bi bi-arrow-up"></i></a>    
@endsection
