@extends('layouts.main')

@section('content')
    @include('Partials.navbar')

    <div class="main">

        {{-- HERO --}}
        <div class="text-secondary px-4 py-5 text-center bg-dark" {{-- style="background-color: #30445C" --}}>
            <div class="py-5">
                {{-- <img src="img/clogo-wht-brand.png" class="img-fluid pb-5" alt="" style="width: 670px"> --}}
                <h1 class="display-5 fw-bold text-white pb-3">Welcome to Greenvest</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="fs-5 mb-4 text-light">
                        Greenvest (Green Investment) adalah sebuah platform dalam bentuk website yang mewadahi adanya
                        aktivitas green investment baik dalam bentuk green company atau green project dan disatukan dalam
                        tiga produk investment yaitu Green Bond, Green Sukuk, dan Green Taxonomy.
                    </p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center pt-4">
                        <a href="{{ route('register') }}">
                            <button type="button" class="btn btn-lg rounded-pill btn-outline-light px-4 me-sm-3">Join
                                Now</button>
                        </a>
                        {{-- <a href="/courseList">
                            <button type="button" class="btn btn-lg rounded-pill btn-dark px-4">Course List</button>
                        </a> --}}
                    </div>
                </div>
            </div>
            {{-- <div class="ratio ratio-16x9">
                <iframe class="" src="uploads/1. TI-2A.pdf" allowfullscreen></iframe>
            </div> --}}
            <br><br>
        </div>

        {{-- Section --}}
        <div class="px-4 py-5" style="background-color: #EDEFF5">
            <br><br>

            <div class="container pt-5 pb-5">

                <div class="justify-content-center">
                    {{-- <div class="card-group gap-4"> --}}
                    <div class="d-grid gap-5 d-sm-flex justify-content-sm-center pt-4">

                        <div class="col-md-4 pe-1">
                            <img class="img-fluid w-100" src="{{ asset('img/home-2.png') }}" alt="">
                        </div>
                        <div class="col-md-5 ps-4">
                            <h3 class="col-md-11 display-6 fw-bold text-dark pb-2">Achieving a Sustainable Economy</h3>
                            <p class="fs-5 fw-light mb-4 text-dark">Mendukung emiten untuk mendapatkan
                                pembiayaan kemudian melakukan ekspansi di dunia industri dengan menerapkan prinsip
                                Environmental Social Governance (ESG) dalam rangka beradaptasi menjadi smart-eco industry.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            <br><br><br>
        </div>

        {{-- Section --}}
        <div class="px-4 py-5" style="background-color: #F9FAFC">
            <br><br>

            <div class="container pt-5 pb-5">

                <div class="justify-content-center">
                    {{-- <div class="card-group gap-4"> --}}
                    <div class="d-grid gap-5 d-sm-flex justify-content-sm-center pt-4">

                        <div class="col-md-5 pe-1">
                            <h3 class="col-md-9 display-6 fw-bold text-dark pb-2">Supportive
                                Climate Action 2030</h3>
                            <p class="fs-5 fw-light mb-4 text-dark">
                                Berkomitmen mengurangi emisi karbon sebanyak 41% pada 2030 dengan dukungan internasional
                                untuk mencapai net-zero emission pada 2060 atau lebih cepat.
                            </p>
                        </div>
                        <div class="col-md-4 ps-4">
                            <img class="img-fluid w-100" src="{{ asset('img/home-1.png') }}" alt="">
                        </div>

                    </div>

                </div>

            </div>

            <br><br><br>
        </div>

        {{-- Section --}}
        <div class="px-4 py-5" style="background-color: #EDEFF5">
            <br>

            <div class="container pt-5 pb-5 text-center justify-content-center px-5">

                <div class="container row justify-content-center text-center pb-4">
                    <h2 class="display-6 fw-bold">Easy-to Use and Reliable Apps</h2>
                    <p class="fs-5 fw-light text-dark">Aplikasi didesain senyaman mungkin bagi pengguna
                    </p>
                </div>

                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-12" style="width: 100%">
                        <div class="justify-content-center text-center pb-5">
                            <img class="img-fluid" src="{{ asset('img/home-3.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col"></div>
                </div>

                <div class="row justify-content-center text-center pt-3">
                    <h2 class="fw-bold">Ready to start your plan?</h2>
                </div>

                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center pt-4 text-center">
                    <a href="{{ route('register') }}">
                        <button type="button"
                            class="btn btn-md rounded-pill px-4 py-3 me-sm-3 text-light fw-bold shadow-custom-green   "
                            style="background-color: #4FBEAB;">Join Now For Free</button>
                    </a>

                </div>

            </div>


        </div>

    </div>

    @include('Partials.footer')
@endsection
