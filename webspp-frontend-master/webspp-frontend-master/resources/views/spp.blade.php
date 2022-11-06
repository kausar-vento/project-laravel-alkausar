@extends('layouts.main')

@section('content')
    @include('partials.navbar')
    <!--Main layout-->
    <main style="margin-top: 58px; margin-left:30px; margin-right: 60px">

        <div class="container pt-4">

            <div class="row">
                <div class="col">
                    <h5 class="" style="font-weight: 400">SPP</h5>
                </div>
            </div>

            <br>

            <div class="row">

                <div class="col">

                    <div class="card shadow-sm bg-white rounded-3">
                        <div class="card-body">

                            <form class="row g-3">
                                <div class="col-md-6">
                                    <label for="bulan" class="form-label">Bulan</label>
                                    <select id="bulan" name="bulan" class="form-select">
                                        <option selected>Januari</option>
                                        <option>Februari</option>
                                        <option>Maret</option>
                                        <option>April</option>
                                        <option>Mei</option>
                                        <option>Juni</option>
                                        <option>Juli</option>
                                        <option>Agustus</option>
                                        <option>September</option>
                                        <option>Oktober</option>
                                        <option>November</option>
                                        <option>Desember</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="text" class="form-control" iid="tahun" name="tahun" placeholder="">
                                </div>
                                <div class="col-12">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder=""">
                                </div>
                                <div class="col-md-6">
                                    <label for="biaya" class="form-label">Biaya</label>
                                    <input type="text" class="form-control" id="biaya" name="biaya" placeholder="">
                                </div>
                                <div class="col-md-6">
                                    <label for="MetodeBayar" class="form-label">Metode Pembayaran</label>
                                    <select id="MetodeBayar" class="form-select" name="MetodeBayar">
                                        <option selected>Bank</option>
                                        <option>LinkAja</option>
                                        <option>DANA</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Bayar</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </main>
@endsection
