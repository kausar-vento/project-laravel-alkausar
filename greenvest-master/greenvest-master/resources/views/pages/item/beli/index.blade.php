@extends('layouts.core')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('Partials.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('Partials.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    {{-- Sub Title --}}
                    <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1 mb-4">
                        <h1 class="h3 pb-2 mb-0 " style="font-weight:700; font-size:32px">
                            <a href="{{ route('item.detail', ['id' => $produk_green->id]) }}" class="text-gray-400"
                                style="text-decoration: none">{{ $produk_green->nama }}</a>
                            <span><i class="fa fa-sm fa-angle-right text-gray-900" aria-hidden="true"></i></span>
                            <span class="text-gray-900">Beli</span>
                        </h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Col - Beli -->
                        <div class="col-xl-8">
                            <div class="card shadow-custom mb-4" style="width:100%">
                                <!-- Card Header -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <div class=" align-items-center justify-content-between">
                                        <h1 class="h4 mb-0 text-gray-800 ">Pembayaran</h1>
                                    </div>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body py-3 ">
                                    <form action="{{ route('transaksi.store') }}" method="POST">
                                        @csrf
                                        <div class="form-outline mb-4">
                                            <label class="form-label">Pilih Metode Bayar</label>
                                            <select class="form-control" aria-label="Default select example" autofocus
                                                required name="bank_id" id="bank_id">
                                                <option selected value="{{ $greenvest->id }}">Saldo Greenvest | Saldo:
                                                    Rp{{ number_format($greenvest->saldo, 0, ',', '.') }}</option>
                                                @foreach ($metodebayar as $item)
                                                    <option value="{{ $item->id }}">{{ $item->bank_name }}

                                                        |
                                                        {{ substr($item->no_rekening, 0, 3) . '******' . substr($item->no_rekening, strlen($item->no_rekening) - 3, 3) }}
                                                @endforeach
                                            </select>
                                            @if ($errors->has('msg2'))
                                                <p class="text-danger" style="font-size: 14px">{{ $errors->first() }}</p>
                                            @endif
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label">Pesan</label>
                                            <input type="text" name="pesan" id="pesan" class="form-control"
                                                autofocus>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label">Total Bayar</label>
                                            <input type="text" name="total_bayar" id="total_bayar" class="form-control"
                                                autofocus required
                                                placeholder="Minimal Pembelian Rp{{ number_format($produk_green->min_pembelian_produk, 0, ',', '.') }}">
                                            @if ($errors->has('msg1'))
                                                <p class="text-danger" style="font-size: 14px">{{ $errors->first() }}</p>
                                            @endif
                                        </div>

                                        <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                                        <input type="hidden" id="produk_green_id" name="produk_green_id"
                                            value="{{ $produk_green->id }}">
                                        <input type="hidden" id="jenis_transaksi" name="jenis_transaksi" value="Pembelian">
                                        <input type="hidden" id="status" name="status" value="Menunggu Pembayaran">
                                        <input type="hidden" id="kode_transaksi" name="kode_transaksi"
                                            value="@php
                                            $kode_transaksi = 'TRX' . date('YmdHis') . $user->id;
                                            echo $kode_transaksi;
                                        @endphp">

                                        <!-- Submit button -->
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('item.detail', ['id' => $produk_green->id]) }}"
                                                    class="btn btn-lg mt-2 px-5 mb-4"
                                                    style="background-color: #F9FAFC; width:100%">Cancel</a>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-lg mt-2 px-5 mb-4 text-light"
                                                    style="background-color: #4FBEAB; width:100%">Beli</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Col -->
                        <div class="col">

                            <!-- Sub Card - GreenVest -->
                            <div class="card shadow-custom mb-4" style="width:100%">
                                <div class="card-header">
                                    <div class=" align-items-center justify-content-between">
                                        <h1 class="h4 mb-0 text-gray-800 ">Saldo GreenVest</h1>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table table-hover table-borderless" id="dataTable" width="100%"
                                            cellspacing="0" style="">
                                            {{-- <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Data</th>
                                                    <th>Data</th>
                                                </tr>
                                            </thead> --}}
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="col">
                                                            <div class="row" style="font-size: 14px; font-weight:bolder">
                                                                {{ $greenvest->bank_name }}
                                                            </div>
                                                            <div class="row text-start text-muted" style="font-size: 14px">
                                                                {{ substr($greenvest->no_rekening, 0, 3) . '******' . substr($greenvest->no_rekening, strlen($greenvest->no_rekening) - 3, 3) }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        Rp{{ number_format($greenvest->saldo, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <!-- Card Footer -->
                                {{-- <div class="card-footer flex-row align-items-center text-center">
                                    <a href="{{ 'portofolio' }}">Lihat Semua</a>
                                </div> --}}
                            </div>

                            <!-- Sub Card - EWallet -->
                            <div class="card shadow-custom mb-4" style="width:100%">
                                <div class="card-header">
                                    <div class=" align-items-center justify-content-between">
                                        <h1 class="h4 mb-0 text-gray-800 ">Akun E-Wallet</h1>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table table-hover table-borderless" id="dataTable" width="100%"
                                            cellspacing="0" style="">
                                            {{-- <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Data</th>
                                                    <th>Data</th>
                                                </tr>
                                            </thead> --}}
                                            <tbody>
                                                @foreach ($ewallet as $item)
                                                    <tr>
                                                        <td>
                                                            <img class="avatar rounded-circle me-2" @php
                                                                if ($item->bank_name == Str::contains($item->bank_name, 'BRIVA')) {
                                                                    echo 'src="'.asset('img/bank/BRIVA.png').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'BSI')) {
                                                                    echo 'src="'.asset('img/bank/BSI.jpg').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'Mandiri')) {
                                                                    echo 'src="'.asset('img/bank/Mandiri.png').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'BNI')) {
                                                                    echo 'src="'.asset('img/bank/BNI.png').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'LinkAja')) {
                                                                    echo 'src="'.asset('img/bank/LinkAja.png').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'GoPay')) {
                                                                    echo 'src="'.asset('img/bank/GoPay.png').'"';
                                                                } else {
                                                                    echo 'src="'.asset('img/item-b1.png').'"';
                                                                }
                                                            @endphp>
                                                        </td>
                                                        <td>
                                                            <div class="col">
                                                                <div class="row"
                                                                    style="font-size: 14px; font-weight:bolder">
                                                                    {{ $item->bank_name }}
                                                                </div>
                                                                <div class="row text-start text-muted"
                                                                    style="font-size: 14px">
                                                                    {{ substr($item->no_rekening, 0, 3) . '******' . substr($item->no_rekening, strlen($item->no_rekening) - 3, 3) }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        {{-- <td>
                                                            <a class="link-info" href="#">Detail</a>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                                @if (count($ewallet) == 0)
                                                    <tr>
                                                        <td colspan="3" class="text-center" style="font-size: 14px">
                                                            <div class="text-muted">
                                                                <i class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i>
                                                                Belum ada akun e-wallet yang terdaftar.
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <!-- Card Footer -->
                                {{-- <div class="card-footer flex-row align-items-center text-center">
                                    <a href="{{ 'portofolio' }}">Lihat Semua</a>
                                </div> --}}
                            </div>

                            <!-- Sub Card - Bank -->
                            <div class="card shadow-custom mb-4" style="width:100%">
                                <div class="card-header">
                                    <div class=" align-items-center justify-content-between">
                                        <h1 class="h4 mb-0 text-gray-800 ">Akun Bank</h1>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-borderless" id="dataTable" width="100%"
                                            cellspacing="0" style="">
                                            {{-- <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Data</th>
                                                    <th>Data</th>
                                                </tr>
                                            </thead> --}}
                                            <tbody>
                                                @foreach ($bank as $item)
                                                    <tr>
                                                        <td>
                                                            <img class="avatar rounded-circle me-2" @php
                                                                if ($item->bank_name == Str::contains($item->bank_name, 'BRIVA')) {
                                                                    echo 'src="'.asset('img/bank/BRIVA.png').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'BSI')) {
                                                                    echo 'src="'.asset('img/bank/BSI.jpg').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'Mandiri')) {
                                                                    echo 'src="'.asset('img/bank/Mandiri.png').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'BNI')) {
                                                                    echo 'src="'.asset('img/bank/BNI.png').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'LinkAja')) {
                                                                    echo 'src="'.asset('img/bank/LinkAja.png').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'GoPay')) {
                                                                    echo 'src="'.asset('img/bank/GoPay.png').'"';
                                                                } else {
                                                                    echo 'src="'.asset('img/item-b1.png').'"';
                                                                }
                                                            @endphp>
                                                        </td>
                                                        <td>
                                                            <div class="col">
                                                                <div class="row"
                                                                    style="font-size: 14px; font-weight:bolder">
                                                                    {{ $item->bank_name }}
                                                                </div>
                                                                <div class="row text-start text-muted"
                                                                    style="font-size: 14px">
                                                                    {{ substr($item->no_rekening, 0, 3) . '******' . substr($item->no_rekening, strlen($item->no_rekening) - 3, 3) }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        {{-- <td>
                                                            <a class="link-info" href="#">Detail</a>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                                @if (count($bank) == 0)
                                                    <tr>
                                                        <td colspan="3" class="text-center" style="font-size: 14px">
                                                            <div class="text-muted">
                                                                <i class="fa fa-exclamation-circle"
                                                                    aria-hidden="true"></i>
                                                                Belum ada akun bank yang terdaftar.
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Card Footer -->
                                {{-- <div class="card-footer flex-row align-items-center text-center">
                                    <a href="{{ 'portofolio' }}">Lihat Semua</a>
                                </div> --}}
                            </div>

                            <!-- Sub Card - Riwayat Transaksi -->
                            <div class="card shadow-custom mb-4" style="width:100%">
                                <div class="card-header">
                                    <div class=" align-items-center justify-content-between">
                                        <h1 class="h4 mb-0 text-gray-800 ">Riwayat Transaksi</h1>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table table-hover table-borderless" id="dataTable" width="100%"
                                            cellspacing="0" style="">
                                            <tbody>
                                                {{-- @foreach ($data as $item) --}}
                                                <tr>
                                                    <td>
                                                        <img class="avatar me-2"
                                                            src="{{ asset('img/item-sample1.png') }}" alt="">
                                                    </td>
                                                    <td>
                                                        <div class="col">
                                                            <div class="row fw-bold">
                                                                Adidas-AM Indeks IDX45
                                                            </div>
                                                            <div class="row text-start fw-lighter text-muted">
                                                                <span style="color: #4FBEAB">+Rp 31.000</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a class="link-info"
                                                            href="{{ route('item.detailtest') }}">Detail</a>
                                                    </td>
                                                </tr>
                                                {{-- @endforeach --}}
                                                <tr>
                                                    <td>
                                                        <img class="avatar me-2"
                                                            src="{{ asset('img/item-sample1.png') }}" alt="">
                                                    </td>
                                                    <td>
                                                        <div class="col">
                                                            <div class="row fw-bold">
                                                                Adidas-AM Indeks IDX45
                                                            </div>
                                                            <div class="row text-start fw-lighter text-muted">
                                                                <span style="color: #4FBEAB">+Rp 30.000</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a class="link-info"
                                                            href="{{ route('item.detailtest') }}">Detail</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img class="avatar me-2"
                                                            src="{{ asset('img/item-sample1.png') }}" alt="">
                                                    </td>
                                                    <td>
                                                        <div class="col">
                                                            <div class="row fw-bold">
                                                                Adidas-AM Indeks IDX45
                                                            </div>
                                                            <div class="row text-start fw-lighter text-muted">
                                                                <span style="color: #4FBEAB">+Rp 30.000</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a class="link-info"
                                                            href="{{ route('item.detailtest') }}">Detail</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img class="avatar me-2"
                                                            src="{{ asset('img/item-sample1.png') }}" alt="">
                                                    </td>
                                                    <td>
                                                        <div class="col">
                                                            <div class="row fw-bold">
                                                                Adidas-AM Indeks IDX45
                                                            </div>
                                                            <div class="row text-start fw-lighter text-muted">
                                                                <span style="color: #D14343">-Rp500.000</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a class="link-info"
                                                            href="{{ route('item.detailtest') }}">Detail</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <!-- Card Footer -->
                                <div class="card-footer flex-row align-items-center text-center">
                                    <a href="{{ route('transaksi.list') }}">Lihat Semua</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('Partials.corefooter')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    @include('Partials.scrolltotop')

    <!-- Logout Modal-->
    @include('Partials.logoutmodal')


    {{-- Custom DataTables --}}
    {{-- <script>
        $('table').dataTable({
            searching: false,
            paging: false,
            info: false
        });
    </script> --}}
@endsection
