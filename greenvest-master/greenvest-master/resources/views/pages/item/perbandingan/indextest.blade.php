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
                            <span class="text-gray-900">Bandingkan Investasi</span>
                        </h1>
                    </div>

                    <!-- Content Row - Chart -->
                    <div class="row">

                        <div class="col">
                            <div class="card shadow-custom mb-4" style="width:100%">
                                <!-- Card Body -->
                                <div class="card-body">
                                    {{-- <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div> --}}
                                    <img class="img-fluid" src="{{ asset('img/visual/chart-dual.png') }}" alt=""
                                        style="width:100%">
                                </div>
                                {{-- <!-- Card Footer -->
                                <div class="card-footer flex-row align-items-center text-center">
                                    <a href="#">Lihat Semua</a>
                                </div> --}}
                            </div>
                        </div>

                    </div>

                    <!-- Content Row - Hero Green -->
                    <div class="row">

                        <!-- Card -->
                        <div class="col d-flex">
                            <div class="card shadow-custom-green mb-4" style="width:100%" {{-- style="background-color: #4FBEAB" --}}>
                                <!-- Card Body -->
                                <div class="card-body text-light" style="background-color: #4FBEAB">
                                    <div class="d-sm-flex align-items-center justify-content-between pt-2 pl-4 pr-2">
                                        <div>
                                            <div style="border-left: 8px solid #ffffff;">
                                                <h3 class="px-3">Adidas-AM Indeks IDX45</h3>
                                            </div>
                                        </div>
                                        <h5>Selected</h5>
                                    </div>
                                    <div class="row d-flex px-3">
                                        <div class="col">
                                            <div class="table-responsive" style="">
                                                <table class="table table-borderless text-light">
                                                    <thead>
                                                        <thead>
                                                            <tr>
                                                                <th>CAGR 1Y</th>
                                                                <th>Drawdown 1Y</th>
                                                                <th>Expense Ratio</th>
                                                                <th>Total AUM</th>
                                                                <th>Jenis Produk</th>
                                                                <th>Tingkat Risiko</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                    </thead>
                                                    <tbody">
                                                        <tr>
                                                            <td>+20.26%</td>
                                                            <td>-10.05%</td>
                                                            <td>1.05%</td>
                                                            <td>1.27T</td>
                                                            <td>Saham</td>
                                                            <td>Tinggi</td>
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

                    <div class="row">

                        <!-- Card -->
                        <div class="col d-flex">
                            <div class="card shadow-custom mb-4" style="width:100%" {{-- style="background-color: #4FBEAB" --}}>
                                <!-- Card Body -->
                                <div class="card-body" style="">
                                    <div class="d-sm-flex align-items-center justify-content-between pt-2 pl-4 pr-2">
                                        <div>
                                            <div style="border-left: 8px solid #FFB020;">
                                                <h3 class="px-3">Adidas-AM Harmoni</h3>
                                            </div>
                                        </div>

                                        <a href="#" class="btn mt-2 text-light" style="background-color: #30445C">
                                            Ganti</a>
                                    </div>
                                    <div class="row d-flex px-3">
                                        <div class="col">
                                            <div class="table-responsive" style="">
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <thead>
                                                            <tr>
                                                                <th>CAGR 1Y</th>
                                                                <th>Drawdown 1Y</th>
                                                                <th>Expense Ratio</th>
                                                                <th>Total AUM</th>
                                                                <th>Jenis Produk</th>
                                                                <th>Tingkat Risiko</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                    </thead>
                                                    <tbody">
                                                        <tr>
                                                            <td>+20.26%</td>
                                                            <td>-10.05%</td>
                                                            <td>1.05%</td>
                                                            <td>1.27T</td>
                                                            <td>Saham</td>
                                                            <td>Tinggi</td>
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
