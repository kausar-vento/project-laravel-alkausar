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
                    <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                        <h1 class="h3 mb-0 text-gray-800 ">Portofolio</h1>
                    </div>

                    <div class="d-sm-flex align-items-center justify-content-between pb-2">
                        <h7 class=" mb-0 text-gray-800 ">Tanggal: {{ Carbon\Carbon::now() }}</h7>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col">
                            <div class="card shadow-custom mb-4" style="width:100%">
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive" style="font-size: 14px">
                                        <table class="table table-hover" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Produk</th>
                                                    <th>Total Pembelian</th>
                                                    <th>Tanggal Beli</th>
                                                    <th>Jatuh Tempo</th>
                                                    {{-- <th>Laba</th> --}}
                                                    <th>NIlai Portofolio</th>
                                                    <th>Aksi</th>
                                                    {{-- <th>Jual</th> --}}
                                                </tr>
                                            <tbody>
                                                @foreach ($list_transaksi as $item)
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
                                                            {{ $item->produk_green->jenis_produk }}
                                                        </td>
                                                        <td>
                                                            Rp{{ number_format($item->total_bayar, 0, ',', '.') }}
                                                        </td>
                                                        <td>
                                                            {{ $item->created_at->format('d F, Y') }}
                                                        </td>
                                                        <td>
                                                            @if ($item->produk_green->jatuh_tempo != 0)
                                                                @php
                                                                    $date = new DateTime($item->created_at);
                                                                    $date->add(new DateInterval('P' . $item->produk_green->jatuh_tempo . 'D'));
                                                                @endphp
                                                                {{ $date->format('d F, Y') }}
                                                            @else
                                                                Tidak ada
                                                            @endif
                                                        </td>
                                                        {{-- <td>
                                                            {{ $dummy_laba->where('produk_green_id', $item->produk_green->id)->pluck('laba')->first() }}%
                                                        </td> --}}
                                                        {{-- Nilai Portofolio --}}
                                                        <td>
                                                            @php
                                                                $nilai_portofolio =
                                                                    $item->total_bayar *
                                                                    ($dummy_laba
                                                                        ->where('produk_green_id', $item->produk_green->id)
                                                                        ->pluck('laba')
                                                                        ->first() /
                                                                        100);
                                                            @endphp
                                                            Rp{{ number_format($item->total_bayar + $nilai_portofolio, 0, ',', '.') }}
                                                        </td>
                                                        <td>
                                                            <a class="link-info"
                                                                href="{{ route('portofolio.detail', ['id' => $item->id]) }}">Detail</a>
                                                        </td>
                                                        {{-- <td>
                                                        <a class="link-info" href="{{ route('item.detailtest') }}">Jual</a>
                                                    </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- <!-- Card Footer -->
                                <div class="card-footer flex-row align-items-center text-center">
                                    <a href="#">Lihat Semua</a>
                                </div> --}}
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
