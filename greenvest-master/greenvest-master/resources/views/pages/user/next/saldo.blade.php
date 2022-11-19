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

                <!-- Add Ons -->
                <div class="container-fluid pt-2 pb-1" style="background-color: #EDEFF5">
                    <div class="d-sm-flex align-items-center justify-content-between">

                        <!-- Card Example - Nilai Porto -->
                        <div class="col mb-4">
                            <div class="card shadow-custom-sm h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @php
                                                    $nilai_portofolio = 0;
                                                    foreach ($portofolio as $item) {
                                                        $nilai_portofolio +=
                                                            $item->total_bayar +
                                                            $item->total_bayar *
                                                                ($dummy_laba
                                                                    ->where('produk_green_id', $item->produk_green->id)
                                                                    ->pluck('laba')
                                                                    ->first() /
                                                                    100);
                                                    }
                                                @endphp
                                                Rp{{ number_format($nilai_portofolio, 0, ',', '.') }}
                                            </div>
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Nilai Portofolio
                                                {{-- <a href="{{ route('user.index') }}" class="btn btn-sm"><i class="fa fa-retweet" aria-hidden="true"></i></a> --}}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img class="img" src="{{ asset('img/gv-logo.png') }}" alt=""
                                                style="height: 100%;width:100%;object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Example - Saldo -->
                        <div class="col mb-4">
                            <div class="card shadow-custom-sm h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @if (!@isset($greenvest))
                                                    Data tidak ada.
                                                @else
                                                    Rp{{ number_format($greenvest->saldo) }}
                                                @endif
                                            </div>
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Saldo Greenvest
                                            </div>

                                        </div>
                                        <div class="col-auto">
                                            <img class="img" src="{{ asset('img/wallet.png') }}" alt=""
                                                style="height: 100%;width:100%;object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Example - Joined -->
                        <div class="col mb-4">
                            <div class="card shadow-custom-sm h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            @php
                                                $join = \Carbon\Carbon::parse($user->created_at);
                                                $now = \Carbon\Carbon::now();
                                                $diff1 = $join->diffInDays($now);
                                                $diff2 = $join->diffInHours($now);
                                                $diff3 = $join->diffInMinutes($now);
                                                $diff4 = $join->diffInSeconds($now);
                                            @endphp
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $diff1 }} Hari
                                                <span class=""
                                                    style="font-weight: 100; font-size:70%">{{-- {{ $diff2 }}:{{ $diff3 }}:{{ $diff4 }} --}}</span>
                                            </div>
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Semenjak Bergabung
                                                {{-- <a href="{{ route('user.index') }}" class="btn btn-sm"><i class="fa fa-retweet" aria-hidden="true"></i></a> --}}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img class="img" src="{{ asset('img/peoples.png') }}" alt=""
                                                style="height: 100%;width:100%;object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    {{-- Sub Title --}}
                    <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                        <h1 class="h3 mb-0 text-gray-800 ">Portofolio Info</h1>
                    </div>

                    <!-- Content Row - Portofolio Info && chart -->
                    <div class="row">

                        <!-- Card - portofolio -->
                        <div class="col d-flex">
                            <div class="card shadow-custom mb-4" style="width:100%">
                                <!-- Card Body -->
                                <div class="card-body">
                                    {{-- <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div> --}}
                                    @if ($portofolio->where('user_id', $user->id)->count() == 0)
                                        <div>
                                            <h1 class="h3 mb-0 text-gray-800">Portofolio Kosong</h1>
                                            <p class="text-muted mb-0">Silahkan selesaikan transaksi terlebih dahulu.</p>
                                        </div>
                                    @else
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
                                                    @foreach ($portofolio->slice(0, 3) as $item)
                                                        <tr>
                                                            <td>
                                                                <img class="avatar rounded-circle me-2"
                                                                    @if ($image->where('produk_green_id', $item->produk_green->id)->pluck('image')->first() != null) src="{{ asset('img/produk/' .$image->where('produk_green_id', $item->produk_green->id)->pluck('image')->first()) }}"
                                                            @else
                                                                src="{{ asset('img/produk/default.png') }}" @endif
                                                                    alt="" style="width:42px; height:42px">
                                                            </td>
                                                            <td>
                                                                <div class="col">
                                                                    <div class="row fw-bold">
                                                                        {{ $item->produk_green->nama }}
                                                                    </div>
                                                                    <div class="row text-start fw-lighter text-muted">
                                                                        @if ($googlefin_format->where('produk_green_id', $item->produk_green->id)->first() != null)
                                                                            @php
                                                                                $n = $googlefin_format
                                                                                    ->where('produk_green_id', $item->produk_green->id)
                                                                                    ->pluck('market_cap')
                                                                                    ->first();

                                                                                if ($n > 1000000000000) {
                                                                                    $nfixed = round($n / 1000000000000, 2) . ' Triliun';
                                                                                } elseif ($n > 1000000000) {
                                                                                    $nfixed = round($n / 1000000000, 2) . ' Milliar';
                                                                                } elseif ($n > 1000000) {
                                                                                    $nfixed = round($n / 1000000, 2) . ' Juta';
                                                                                }
                                                                            @endphp
                                                                        @endif
                                                                        Year Return:
                                                                        {{ $googlefin_format->where('produk_green_id', $item->produk_green->id)->pluck('div_yield')->first() }}%
                                                                        |
                                                                        Market Cap:
                                                                        @if ($googlefin_format->where('produk_green_id', $item->produk_green->id)->first() != null)
                                                                            {{ $nfixed }}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a class="link-info"
                                                                    href="{{ route('portofolio.detail', ['id' => $item->id]) }}">Detail</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    @endif

                                </div>
                                <!-- Card Footer -->
                                <div class="card-footer flex-row align-items-center text-center">
                                    <a href="{{ 'portofolio' }}">Lihat Semua</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card - chart -->
                        <div class="col d-flex">
                            <div class="card shadow-custom mb-4" style="width:100%">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <a href="{{ route('user.index') }}" class="btn btn-light " style=" width: 100%">
                                        Total
                                    </a>
                                    <a href="{{ route('dashboard.saldo') }}" class="btn text-light "
                                        style="background-color: #4FBEAB; width: 100%">
                                        Saldo
                                    </a>
                                    <a href="{{ route('dashboard.total_bayar') }}" class="btn btn-light "
                                        style=" width: 100%">
                                        Pembayaran
                                    </a>
                                    <a href="{{ route('dashboard.keuntungan') }}" class="btn btn-light "
                                        style=" width: 100%">
                                        Keuntungan
                                    </a>
                                </div>
                                @php
                                    $p_saldo = 0;
                                    $p_total_bayar = 0;
                                    $p_nilai_porto = 0;
                                @endphp
                                <!-- Card Body -->
                                <div class="card-body py-3 ">
                                    <div class="row pt-3">
                                        @if (isset($greenvest))
                                            @if ($greenvest->saldo != 0 || $nilai_portofolio != 0)
                                                @php
                                                    $saldo = $greenvest->saldo;
                                                    $total_bayar = $portofolio->sum('total_bayar');
                                                    $nilai_porto = $nilai_portofolio;
                                                    $all = $saldo + $total_bayar + $nilai_porto;
                                                    /* dd($saldo, $total_bayar, $nilai_porto); */
                                                    $p_saldo = round(($saldo / $all) * 100);
                                                    $p_total_bayar = round(($total_bayar / $all) * 100);
                                                    $p_nilai_porto = round(($nilai_porto / $all) * 100);
                                                    /* dd($p_saldo, $p_total_bayar, $p_nilai_porto); */
                                                @endphp
                                            @else
                                                @php
                                                    $saldo = 0;
                                                    $total_bayar = 0;
                                                    $nilai_porto = 0;
                                                    $p_saldo = 0;
                                                    $p_total_bayar = 0;
                                                    $p_nilai_porto = 0;
                                                @endphp
                                            @endif
                                        @endif
                                        <div class="col">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                                                Rp{{ $saldo }}
                                            </div>
                                            <div class="font-weight-bold text-uppercase mb-1 text-center">
                                                Saldo Greenvest
                                            </div>
                                            <h4 class="small font-weight-bold">Saldo Greenvest<span
                                                    class="float-right">{{ $p_saldo }}%</span>
                                            </h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ $p_saldo }}%; background-color:#4FBEAB"
                                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <h4 class="small font-weight-bold">Nilai Portofolio<span
                                                    class="float-right">{{ $p_nilai_porto }}%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ $p_nilai_porto }}%; background-color:#378AEC"
                                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <h4 class="small font-weight-bold">Total Pembayaran<span
                                                    class="float-right">{{ $p_total_bayar }}%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ $p_total_bayar }}%; background-color:#FFB020"
                                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-3">
                                            <div class="pt-4 pb-2">
                                                @if (isset($greenvest) && isset($nilai_portofolio))
                                                    @if ($greenvest->saldo != 0 || $nilai_portofolio != 0)
                                                        <canvas id="myPieChart"></canvas>
                                                    @else
                                                        <div class="text-center">
                                                            <h1>0</h1>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="text-center">
                                                        <h1>0</h1>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div>
                                                <h4 class="small font-weight-bold">Saldo Greenvest<span
                                                        class="float-right">{{ $p_saldo }}%</span>
                                                </h4>
                                                <div class="progress mb-4">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: {{ $p_saldo }}%; background-color:#4FBEAB"
                                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>

                                                <h4 class="small font-weight-bold">Total Pembayaran<span
                                                        class="float-right">{{ $p_total_bayar }}%</span></h4>
                                                <div class="progress mb-4">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: {{ $p_total_bayar }}%; background-color:#FFB020"
                                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>

                                                <h4 class="small font-weight-bold">Nilai Portofolio<span
                                                        class="float-right">{{ $p_nilai_porto }}%</span></h4>
                                                <div class="progress mb-4">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: {{ $p_nilai_porto }}%; background-color:#378AEC"
                                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sub Title - List Transaksi -->
                    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
                        <h1 class="h3 mb-0 text-gray-800 ">List Transaksi</h1>
                    </div>

                    <!-- Content Row - List Transaksi -->
                    <div class="row">

                        <div class="col">
                            <div class="card shadow-custom mb-4" style="width:100%">
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            {{-- <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Nama</th>
                                                    <th>Jenis Green</th>
                                                    <th>Total Bayar</th>
                                                    <th>Jenis Transaksi</th>
                                                    <th>Tanggal</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead> --}}
                                            <tbody>
                                                @foreach ($list_transaksi->slice(0, 4) as $item)
                                                    <tr class="">
                                                        <td>
                                                            <img class="avatar rounded-circle me-2"
                                                                @if ($image->where('produk_green_id', $item->produk_green->id)->pluck('image')->first() != null) src="{{ asset('img/produk/' .$image->where('produk_green_id', $item->produk_green->id)->pluck('image')->first()) }}"
                                                            @else
                                                                src="{{ asset('img/produk/default.png') }}" @endif
                                                                alt="" style="width:42px; height:42px">
                                                        </td>
                                                        <td>
                                                            {{ $item->produk_green->nama }}
                                                        </td>
                                                        <td>
                                                            {{ $item->produk_green->green->nama }}
                                                        </td>
                                                        <td>
                                                            Rp{{ number_format($item->total_bayar, 0, ',', '.') }}
                                                        </td>
                                                        <td class="">
                                                            {{ $item->jenis_transaksi }}
                                                        </td>
                                                        <td>
                                                            {{ $item->created_at->format('d M, Y') }}
                                                        </td>
                                                        <td>
                                                            @if ($item->status == 'Selesai')
                                                                <span class="badge badge-success">
                                                                    {{ $item->status }}
                                                                </span>
                                                            @elseif ($item->status == 'Dibatalkan')
                                                                <span class="badge badge-danger">
                                                                    {{ $item->status }}
                                                                </span>
                                                            @elseif ($item->status == 'Pending')
                                                                <span class="badge badge-warning">
                                                                    {{ $item->status }}
                                                                </span>
                                                            @elseif ($item->status == 'Menunggu Pembayaran')
                                                                <span class="badge badge-primary">
                                                                    {{ $item->status }}
                                                                </span>
                                                            @elseif ($item->status == 'Terjual')
                                                                <span class="badge badge-info">
                                                                    {{ $item->status }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('transaksi.detail', ['id' => $item->id]) }}"
                                                                class="">
                                                                Detail
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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

    <script></script>

    {{-- Custom DataTables --}}
    <script>
        $('table').dataTable({
            searching: false,
            paging: false,
            info: false
        });
    </script>
@endsection
