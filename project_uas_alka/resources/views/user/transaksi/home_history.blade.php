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

<center>
    <h1 class="mt-5">HISTORY PEMBELIAN KELAS</h1>
</center>
<div class="container">
    @if ($dataT->isEmpty())
    <br>
    <center>
        <h2>Anda Belum Melakukan Transaksi</h2>
        <br>
    </center>
    <center>
        <h4>Silahkan Melakukan Transaksi Terlebih Dahulu</h4>
        <br>
    </center>
    @else
    <table class="table mt-5 mb-5">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Nama User</th>
                <th scope="col">Bukti</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataT as $item)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->user->first_name}}</td>
                <td>{{$item->course->judul_course}}</td>
                <td><img src="{{asset('storage/' . $item->bukti_upload)}}" width="40%"></td>
                <td>
                    @if ($item->status == 1)
                    <button class="btn btn-warning text-light">Menunggu</button>
                    @elseif ($item->status == 2)
                    <button class="btn btn-success">Lunas</button>
                    @elseif ($item->status == 3)
                    <button class="btn btn-danger">Gagal</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>



@endsection
