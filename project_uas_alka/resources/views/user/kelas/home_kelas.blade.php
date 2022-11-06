@extends('layouts.navbar_user')

@section('navbar-user')

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
                            <h1 class="h1 text-success"><b>BIM</b>LMS</h1>
                            <h3 class="h2">Course Terbaik Untuk Belajar</h3>
                            <p>
                                menyediakan platform belajar yang digunakan oleh banyak user, dan mempermudah user untuk
                                mendapatkan pengalaman belajar dari mentor - mentor yang hebat dan juga cerdas
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
                            <h1 class="h1 text-success"><b>BIM</b>LMS</h1>
                            <h3 class="h2">Course Terbaik Untuk Belajar</h3>
                            <p>
                                menyediakan platform belajar yang digunakan oleh banyak user, dan mempermudah user untuk
                                mendapatkan pengalaman belajar dari mentor - mentor yang hebat dan juga cerdas
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
                            <h1 class="h1 text-success"><b>BIM</b>LMS</h1>
                            <h3 class="h2">Course Terbaik Untuk Belajar</h3>
                            <p>
                                menyediakan platform belajar yang digunakan oleh banyak user, dan mempermudah user untuk
                                mendapatkan pengalaman belajar dari mentor - mentor yang hebat dan juga cerdas
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
<div class="album py-5 bg-light">
    <div class="container">
        @if ($dataK->isEmpty())
        <center>
            <h1>KAMU BELUM MEMPUNYAI KELAS</h1>
        </center>
        @else
        <div class="row">
            <center><h1>MY COURSE</h1></center>
            @foreach ($dataK as $item)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c" /><text x="35%" y="50%" fill="#eceeef"
                            dy=".3em">{{$item->course->judul_course}}</text>
                    </svg>
                    <div class="card-body">
                        <p class="card-text">
                            {{ Illuminate\Support\Str::limit(strip_tags($item->course->deskripsi), 100) }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{route('user.bacaKelas', $item->course->id)}}" class="btn btn-sm btn-outline-success">View</a>
                            </div>
                            <small class="">{{$item->course->subcategory['nama_subcategory']}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

@endsection
