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

                    {{-- Sub Title - Nama Produk --}}
                    <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1 mb-4">
                        <div class="">
                            <h1 class="text-gray-800" style="font-weight:700; font-size:32px;">
                                <a href="{{ url()->previous() }}" class="btn rounded-circle mr-1"
                                    style="background-color: #EDEFF5">
                                    <i class="fa fa-angle-left" style="width: 9px; height:9px"></i>
                                </a>
                                {{ $produk_green->nama }}
                            </h1>
                        </div>
                        {{-- <div class="pb-2">
                            <a href="#" class="btn btn-lg shadow-custom-green mt-2 text-light"
                                style="background-color: #4FBEAB">
                                Jual</a>
                        </div> --}}
                    </div>

                    <!-- Content Row - Detail -->
                    <div class="row">

                        <div class="col-xl-8 d-flex">
                            <div class="card shadow-custom mb-4" style="width:100%">
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="" method="">
                                        {{-- @csrf --}}
                                        {{-- <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}"> --}}

                                        <div class="row d-flex">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Nama Produk</label>
                                                <input type="text" name="" class="form-control" autofocus required
                                                    value="{{ $produk_green->nama }}" disabled>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Jenis Produk</label>
                                                <input type="text" name="" class="form-control" autofocus required
                                                    value="{{ $produk_green->jenis_produk }}" disabled>
                                            </div>
                                        </div>

                                        <div class="row d-flex">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Kode Transaksi</label>
                                                <input type="text" name="" class="form-control" autofocus required
                                                    value="{{ $this_transaksi->kode_transaksi }}" disabled>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Tanggal Pembelian</label>
                                                <input type="text" name="" class="form-control" autofocus required
                                                    value="{{ $this_transaksi->created_at->format('d F, Y') }}" disabled>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Jatuh Tempo</label>
                                                <input type="text" name="" class="form-control" autofocus required
                                                    @if ($produk_green->jatuh_tempo != 0) @php
                                                        $date = new DateTime($this_transaksi->created_at);
                                                        $date->add(new DateInterval('P' . $produk_green->jatuh_tempo . 'D'));
                                                    @endphp
                                                    value="{{ $date->format('d F, Y') }}"
                                                @else
                                                    value="Tidak ada" @endif
                                                    disabled>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Harga Beli</label>
                                                <input type="text" name="" class="form-control" autofocus required
                                                    value="{{ $this_transaksi->total_bayar }}" disabled>
                                            </div>
                                        </div>

                                        <div class="row d-flex">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Catatan</label>
                                                <input type="text" name="" class="form-control" autofocus required
                                                    value="{{ $this_transaksi->pesan }}" disabled>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card shadow-custom-green mb-4" style="width:100%">
                                <!-- Card Body -->
                                <div class="card-body" style="background-color: #4FBEAB">
                                    @php
                                        $nilai_portofolio = $this_transaksi->total_bayar * ($dummy_laba->laba / 100);
                                    @endphp
                                    <div class="row no-gutters align-items-center">
                                        <div class="col">
                                            <p class="text-light mb-0">Keuntungan</p>
                                            <h3 class="text-light" style="font-weight: 700">
                                                +{{ $dummy_laba->laba }}%
                                            </h3>
                                        </div>
                                        <div class="col-auto">
                                            <img class="img" src="{{ asset('img/1x/Asset 5.png') }}" alt=""
                                                style="height:100%; width:100%; object-fit: cover;">
                                        </div>
                                    </div>

                                    <p class="text-light mb-0">Nilai Portofolio</p>
                                    <h3 class="text-light" style="font-weight: 700">
                                        Rp{{ number_format($this_transaksi->total_bayar + $nilai_portofolio, 0, ',', '.') }}
                                    </h3>
                                    <div class="row">
                                        <div class="col">
                                            <form action="{{ route('portofolio.jual') }}" method="POST" onclick="return confirm('Are you sure?')">
                                                @csrf
                                                <input type="hidden" name="old_transaksi_id"
                                                    value="{{ $this_transaksi->id }}">
                                                <input type="hidden" name="user_id"
                                                    value="{{ $this_transaksi->user->id }}">
                                                <input type="hidden" name="produk_green_id"
                                                    value="{{ $this_transaksi->produk_green->id }}">
                                                <input type="hidden" name="bank_id"
                                                    value="{{ $this_transaksi->bank->id }}">
                                                <input type="hidden" name="total_bayar"
                                                    value="{{ $this_transaksi->total_bayar + $nilai_portofolio }}">
                                                <input type="hidden" name="jenis_transaksi"
                                                    value="Penjualan">
                                                <input type="hidden" name="status" value="Pending">
                                                <input type="hidden" name="kode_transaksi"
                                                    value="@php
                                            $kode_transaksi = 'TRX' . date('YmdHis') . $user->id;
                                            echo $kode_transaksi;
                                        @endphp">
                                                <button class="btn btn-light mt-3 px-5" style="width:100%" type="submit"
                                                    @php
                                                        $date = new DateTime($this_transaksi->created_at);
                                                        $date->add(new DateInterval('P' . $produk_green->jatuh_tempo . 'D'));
                                                        $datenow = Carbon\Carbon::now();
                                                    @endphp @if ($date > $datenow)
                                                    disabled
                                                    @endif>Jual</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row - Data Produk Green -->
                    <div class="row">

                        <div class="col-xl-8">
                            <div class="card shadow-custom mb-4 style="width:100%">
                                <!-- Card Body -->
                                <div class="card-body">

                                    <div class="d-sm-flex align-items-center justify-content-between mb-3">
                                        <div class="">
                                            <img class="avatar rounded-circle me-2"
                                                @if (isset($image)) src="{{ asset('img/produk/' . $image->image) }}"
                                                @else
                                                    src="{{ asset('img/produk/default.png') }}" @endif
                                                style="width:42px; height:42px">
                                            <h4 class="ml-3" style="display: inline">{{ $produk_green->nama }}</h4>
                                        </div>
                                        <div class="">
                                            <a href="{{ route('item.detail', ['id' => $produk_green->id]) }}"
                                                class="btn">Lihat Detail</a>
                                            {{-- <button class="btn"></button> --}}
                                        </div>
                                    </div>
                                    <div class="col">

                                    </div>
                                    <div class="row d-flex px-3">
                                        <div class="col">
                                            <div class="table-responsive" style="">
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <thead>
                                                            <tr>
                                                                <th>Previous Closing</th>
                                                                <th>Year Return</th>
                                                                <th>Market Cap</th>
                                                                <th>Jenis Produk</th>
                                                            </tr>
                                                        </thead>
                                                    </thead>
                                                    <tbody">
                                                        <tr>
                                                            @if (isset($googlefin_format))
                                                                @php
                                                                    $n = $googlefin_format->market_cap;

                                                                    if ($n > 1000000000000000000) {
                                                                        $nfixed = round($n / 1000000000000000000, 2) . ' Kuintiliun';
                                                                    } elseif ($n > 1000000000000000) {
                                                                        $nfixed = round($n / 1000000000000000, 2) . ' Kuadriliun';
                                                                    } elseif ($n > 1000000000000) {
                                                                        $nfixed = round($n / 1000000000000, 2) . ' Triliun';
                                                                    } elseif ($n > 1000000000) {
                                                                        $nfixed = round($n / 1000000000, 2) . ' Milliar';
                                                                    } elseif ($n > 1000000) {
                                                                        $nfixed = round($n / 1000000, 2) . ' Juta';
                                                                    } else {
                                                                        $nfixed = number_format($n, 0, ',', '.');
                                                                    }
                                                                @endphp

                                                                <td>Rp{{ number_format($googlefin_format->pre_close, 0, ',', '.') }}
                                                                </td>
                                                                <td>{{ $googlefin_format->div_yield }}%</td>
                                                                <td>{{ $nfixed }}</td>
                                                                <td>{{ $produk_green->jenis_produk }}</td>
                                                            @endif
                                                        </tr>
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
