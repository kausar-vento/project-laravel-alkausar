@extends('layouts.main')

@section('content')
    @include('partials.navbar')
    <!--Main layout-->
    <main style="margin-top: 58px; margin-left:30px; margin-right: 60px">

        <div class="container pt-4">

            <div class="row">
                <div class="col">
                    <h5 class="" style="font-weight: 400">Beranda</h5>
                </div>
            </div>

            <br>

            <div class="row">

                <div class="col-8">

                    {{-- <div class="card shadow-sm bg-white rounded-3" style="height: 160px" >
                        <div class="card-body">
                            <h7 class="card-subtitle mb-2 text-muted">Selamat Datang</h7>
                            <h5 class="card-title">MUHAMAD ALIF RIZKI</h5>

                        </div>
                        <div class="container px-3 pb-2">
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <p class="mt-0 mb-0" style="color: #62666A">2041720196</p>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <button type="button" class="btn btn-outline-primary float-end">Primary</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="card shadow-sm bg-white rounded-3"  >
                        <div class="card-body">
                            <div class="row">
                                <h7 class="card-subtitle fw-lighter mb-2 text-muted">Selamat Datang</h7>
                            </div>
                            <div class="row">
                                <h5 class="card-title fw-bolder">MUHAMAD ALIF RIZKI</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <p class="fst-normal mt-3 mb-0" style="color: #62666A">2041720196</p>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <a href="/data_diri" class="btn btn-outline-primary float-end">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col">
                    {{-- <div class="card shadow-sm text-light rounded-3" style="background-color: #576ACA; height: 160px">
                        <div class="card-body">
                            <h7 class="card-subtitle mb-2">SPP bulan ini</h7>
                            <h5 class="card-title" style="font-size: 34px">SPP-4</h5>
                        </div>
                        <div class="container px-3">
                            <p class="" style="">April 2022</p>
                        </div>
                    </div> --}}

                    <div class="card shadow-sm text-light rounded-3" style="background-color: #576ACA">
                        <div class="card-body">
                            <div class="row">
                                <h7 class="card-subtitle mb-2 fw-lighter">SPP bulan ini</h7>
                            </div>
                            <div class="row">
                                <h5 class="card-title fw-bolder" >SPP-4</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <p class="fst-normal mt-3 mb-0">April 2022</p>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <a href="/spp" class="btn btn-outline-light float-end">Bayar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-4">

                <div class="col">

                    <div class="card shadow-sm bg-white rounded-3">
                        <div class="card-body">

                            <table class="table table-hover table-borderless table-responsive">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Biaya</th>
                                    <th scope="col">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Januari</td>
                                    <td>2022</td>
                                    <td>SPP-1</td>
                                    <td>3.500.000</td>
                                    <td>Lunas</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Februari</td>
                                    <td>2022</td>
                                    <td>SPP-2</td>
                                    <td>3.500.000</td>
                                    <td>Lunas</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Maret</td>
                                    <td>2022</td>
                                    <td>SPP-3</td>
                                    <td>3.500.000</td>
                                    <td>Lunas</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </main>
@endsection





