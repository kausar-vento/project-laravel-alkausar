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
                                <span class="badge text-light"
                                    @if ($produk_green->kategori == 'Green') style="font-weight:500; font-size:15px; background-color:#4FBEAB"
                                    @elseif ($produk_green->kategori == 'Yellow')
                                        style="font-weight:500; font-size:15px; background-color:#FFB020"
                                    @elseif ($produk_green->kategori == 'Red')
                                        style="font-weight:500; font-size:15px; background-color:#D14343" @endif>
                                    {{ $produk_green->kategori }}
                                </span>
                            </h1>
                        </div>
                        <div class="pb-2">
                            <a href="{{ route('item.simulasi', ['id' => $produk_green->id]) }}"
                                class="btn btn-lg shadow-custom-alt mt-2 text-light" style="background-color: #30445C">
                                Simulasi</a>
                            <a href="{{ route('item.beli', ['id' => $produk_green->id]) }}"
                                class="btn btn-lg shadow-custom-green mt-2 text-light" style="background-color: #4FBEAB">
                                Beli</a>
                        </div>
                    </div>

                    <!-- Content Row - Chart -->
                    <div class="row">

                        <div class="col">
                            <div class="card shadow-custom mb-4" style="width:100%">
                                <!-- Card Body -->
                                <div class="card-body">
                                    @if (isset($charts))
                                        @if ($charts['charts']['1month'] != null)
                                            <div class="d-sm-flex align-items-center justify-content-between">
                                                <p class="" style="font-weight: 800">{{ $charts['info']['ticker'] }}
                                                </p>
                                                <span class="badge text-dark"
                                                    style="font-weight:500; font-size:11px; background-color:#f1eded">
                                                    *Data dari Google Finance API
                                                </span>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                        @if (!isset($charttest) && !isset($charts))
                                            <div class="text-center">
                                                Tidak ada data.
                                            </div>
                                            @if (isset($charts))
                                                @if ($charts['charts']['1month'] == null)
                                                    <div class="text-center">
                                                        Tidak ada data dari Google Finance untuk saat ini.
                                                    </div>
                                                @endif
                                            @endif
                                        @endif
                                        @if (isset($charts))
                                            @if ($charts['charts']['1month'] == null)
                                                <div class="text-center">
                                                    Tidak ada data dari Google Finance untuk saat ini.
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                {{-- <!-- Card Footer -->
                                <div class="card-footer flex-row align-items-center text-center">
                                    <a href="#">Lihat Semua</a>
                                </div> --}}
                            </div>
                        </div>

                    </div>

                    <!-- Content Row - Data Produk Green -->
                    <div class="row">

                        <!-- Card -->
                        {{-- <div class="col d-flex">
                            <div class="card shadow-custom-green mb-4" style="width:100%">
                                <!-- Card Body -->
                                <div class="card-body text-light" style="background-color: #4FBEAB">

                                    <div class="row d-flex px-3">
                                        <div class="col-xl-10">
                                            <div class="table-responsive" style="">
                                                <table class="table table-borderless text-light">
                                                    <thead>
                                                        <thead>
                                                            <tr>
                                                                <th>1 Year Return</th>
                                                                <th>Total AUM</th>
                                                                <th>Jenis Produk</th>
                                                                <th>Tingkat Risiko</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                    </thead>
                                                    <tbody">
                                                        <tr>
                                                            <td>{{ $produk_green->year_return }}</td>
                                                            <td>{{ $produk_green->total_aum }}</td>
                                                            <td>{{ $produk_green->jenis_produk }}</td>
                                                            <td>{{ $produk_green->tingkat_risiko }}</td>
                                                        </tr>
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 pt-2">
                                            <a href="{{ route('item.bandingtest') }}" class="btn btn-light mt-2"
                                                style="width:100%">Bandingkan</a>
                                            <div class="text-center pt-3">
                                                <a href="#" class="text-light">
                                                    <i class="fas fa-fw fa-question"></i>
                                                    <span>Bantuan</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}

                        <div class="col d-flex">
                            <div class="card shadow-custom-green mb-4" style="width:100%">
                                <!-- Card Body -->
                                <div class="card-body text-light" style="background-color: #4FBEAB">

                                    <div class="row d-flex px-3">
                                        <div class="col-xl-10">
                                            <div class="table-responsive" style="">
                                                <table class="table table-borderless text-light">
                                                    <thead>
                                                        <thead>
                                                            <tr>
                                                                <th>Closing</th>
                                                                <th>Year Return</th>
                                                                <th>Market Cap</th>
                                                                <th>Jenis Produk</th>
                                                                <th>Tingkat Risiko</th>
                                                                <th></th>
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
                                                                <td>{{ $produk_green->tingkat_risiko }}</td>
                                                            @endif
                                                        </tr>
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 pt-2">
                                            <a href="{{ route('item.bandingtest' , ['id' => $produk_green->id]) }}" class="btn btn-light mt-2"
                                                style="width:100%">Bandingkan</a>
                                            <div class="text-center pt-3">
                                                <a href="#" class="text-light">
                                                    <i class="fas fa-fw fa-question"></i>
                                                    <span>Bantuan</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row - Asset -->
                    <div class="row mt-2">

                        <div class="col">
                            {{-- <h4 class=" text-gray-800 ">Manajer Investasi</h4> --}}
                            <div class="card mb-4" style="width:100%">
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row d-flex px-3">
                                        <div class="col">
                                            <div class="table-responsive" style="">
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <thead>
                                                            <tr>
                                                                <th>Minimal Pembelian</th>
                                                                <th>Biaya Pembelian</th>
                                                                <th>Biaya Penjualan</th>
                                                                <th>Biaya Penampung</t </tr>
                                                        </thead>
                                                    </thead>
                                                    <tbody">
                                                        <tr>
                                                            <td>Rp{{ number_format($produk_green->min_pembelian_produk) }}
                                                            </td>
                                                            <td>
                                                                @if ($produk_green->biaya_pembelian == 0)
                                                                    Gratis
                                                                @else
                                                                    {{ $produk_green->biaya_pembelian }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($produk_green->biaya_penjualan == 0)
                                                                    Gratis
                                                                @else
                                                                    {{ $produk_green->biaya_penjualan }}
                                                                @endif
                                                            </td>
                                                            <td>{{ $produk_green->biaya_penampung }}</td>
                                                        </tr>
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card - Manaher Investasi-->
                        {{-- <div class="col d-flex">

                            <div class="col">
                                <h4 class=" text-gray-800 ">Manajer Investasi</h4>
                                <div class="card shadow-custom mb-4" style="width:100%">
                                    <!-- Card Body -->
                                    <div class="card-body">

                                        <div class="row d-flex px-3">
                                            Minimal Pembelian
                                        </div>
                                        <div class="row d-flex px-3" style="font-weight: bolder">
                                            Rp{{ number_format($produk_green->min_pembelian_produk) }}
                                        </div>

                                        <div class="row d-flex px-3 pt-2">
                                            Biaya Pembelian
                                        </div>
                                        <div class="row d-flex px-3 pt-2" style="font-weight: bolder">
                                            @if ($produk_green->biaya_pembelian == 0)
                                                Gratis
                                            @else
                                                {{ $produk_green->biaya_pembelian }}
                                            @endif
                                        </div>

                                        <div class="row d-flex px-3 pt-2">
                                            Biaya Penjualan
                                        </div>
                                        <div class="row d-flex px-3" style="font-weight: bolder">
                                            @if ($produk_green->biaya_penjualan == 0)
                                                Gratis
                                            @else
                                                {{ $produk_green->biaya_penjualan }}
                                            @endif
                                        </div>

                                        <div class="row d-flex px-3 pt-2">
                                            Biaya Penampung
                                        </div>
                                        <div class="row d-flex px-3" style="font-weight: bolder">
                                            {{ $produk_green->biaya_penampung }}
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div> --}}

                        <!-- Card - Data Switching-->
                        {{-- <div class="col d-flex">

                            <div class="col">
                                <h4 class=" text-gray-800 ">Data Switching</h4>
                                <div class="card shadow-custom mb-4" style="width:100%">
                                    <!-- Card Body -->
                                    <div class="card-body">

                                        <div class="row d-flex px-3">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        @foreach ($switch as $item)
                                                            <tr>
                                                                <td>{{ $item->nama }}</td>
                                                            </tr>
                                                        @endforeach
                                                        @if (count($switch) == 0)
                                                            <tr>
                                                                <td>Tidak ada data lain dari perusahaan ini.</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                    @if (count($switch) > 5)
                                        <div class="card-footer flex-row align-items-center text-center">
                                            <a href="#">Lihat Semua</a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div> --}}

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
