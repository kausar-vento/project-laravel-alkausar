@extends('layouts.navbar_user')

@section('navbar-user')

<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{asset('user/img/banner1.png')}}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success"><b>ECO</b>BOOK</h1>
                            <h3 class="h2">Webiste Jual Beli Buku Bekas</h3>
                            <p>
                                <i>Platform</i> Jual Beli Buku Bekas Yang Berguna Bagi Para Masyarakat Yang Gemar
                                Mengoleksi Buku - Buku Lama Ataupun Yang Sedang Mencari Buku - Buku Bekas
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{asset('user/img/banner2.png')}}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-success"><b>ECO</b>BOOK</h1>
                            <h3 class="h2">Webiste Jual Beli Buku Bekas</h3>
                            <p>
                                <i>Platform</i> Jual Beli Buku Bekas Yang Berguna Bagi Para Masyarakat Yang Gemar
                                Mengoleksi Buku - Buku Lama Ataupun Yang Sedang Mencari Buku - Buku Bekas
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{asset('user/img/banner3.png')}}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-success"><b>ECO</b>BOOK</h1>
                            <h3 class="h2">Webiste Jual Beli Buku Bekas</h3>
                            <p>
                                <i>Platform</i> Jual Beli Buku Bekas Yang Berguna Bagi Para Masyarakat Yang Gemar
                                Mengoleksi Buku - Buku Lama Ataupun Yang Sedang Mencari Buku - Buku Bekas
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->

<section class="bg-light">
    <div class="container py-3">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Top Buku Terlaris</h1>
            </div>
        </div>
        @if ($topC->isEmpty())
        <div class="row">
            <center>
                <h1>KOSONG</h1>
            </center>
        </div>
        @else
        <div class="row">
            @foreach ($topC as $item)
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="{{route('user.readMore', $item->id)}}">
                        <img src="{{asset('user/img/feature_prod_03.jpg')}}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                            </li>
                            <li class="text-muted text-right">Rp <b>{{$item->harga_langganan}}</b></li>
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">{{$item->judul_course}}</a>
                        <p class="card-text">
                            Klik Gambar Untuk Info Kelas Lebih Lanjut
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>

</section>

@endsection
