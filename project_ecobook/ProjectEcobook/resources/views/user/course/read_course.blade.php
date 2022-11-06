@extends('layouts.navbar_user')

@section('navbar-user')
<link rel="stylesheet" type="text/css" href="{{asset('user/css/slick.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('user/css/slick-theme.css')}}">

<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="{{asset('storage/' . $read->thumbnail)}}" alt="Card image cap"
                        id="product-detail">
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">{{$read->judul_course}}</h1>
                        <p class="h3 py-2">Rp <b>{{$read->harga_langganan}}</b></p>
                        <p class="py-2">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Category: <b>{{$read->subcategory['nama_subcategory']}}</b></h6>
                                <br>
                                <h6>Tujuan Kelas: <b>{{$read->tujuan}}</b></h6>
                            </li>
                        </ul>

                        <h6>Deskripsi Kelas</h6>
                        {!!$read->deskripsi!!}
                        <br>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Author : <b>{{$read->admin['nama_admin']}}</b></h6>
                            </li>
                        </ul>

                        <h6>Requirements:</h6>
                        <ul class="list-unstyled pb-3">
                            {!!$read->requirement!!}
                        </ul>

                        <h6>Hal Yang Akan Dipelajarin:</h6>
                        <ul class="list-unstyled pb-3">
                            {!!$read->dipelajarin!!}
                        </ul>

                        <h6>Materi</h6>
                        <div class="accordion accordion-flush mb-5" id="accordionFlushExample">
                            @foreach ($materi as $item)
                            <div class="card">
                                <div class="card-body">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-{{$item->id}}"
                                                aria-expanded="false" aria-controls="flush-{{$item->id}}">
                                                {{$item->nama_materi}}
                                            </button>
                                        </h2>
                                        <div id="flush-{{$item->id}}" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">{!!$item->deskripsi!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="row pb-3">
                            <div class="col d-grid">
                                <a class="btn btn-danger btn-lg" href="/course/allcourses">Kembali</a>
                            </div>
                            <div class="col d-grid">
                                <a class="btn btn-success btn-lg" href="{{route('user.fTransaksi', $read->id)}}">Add to
                                    Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
