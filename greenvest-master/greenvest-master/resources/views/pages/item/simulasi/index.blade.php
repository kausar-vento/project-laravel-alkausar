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
                            <span class="text-gray-900">Simulasi Investasi</span>
                        </h1>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="card shadow-custom mb-4" style="width:100%">
                                <!-- Card Body -->
                                <div class="card-body">

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('item.dummysimulasi') }}" method="POST">
                                        @csrf
                                        <div class="form-outline mb-4">
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <input type="hidden" name="produk_green_id" value="{{ $produk_green->id }}">
                                            <label class="form-label">Masukkan jumlah investasi</label>
                                            <input type="text" name="jumInves" class="form-control" autofocus required
                                                @if (isset($dummy_simulasi)) placeholder="{{ $dummy_simulasi->jumInves }}" @endif>
                                        </div>
                                        {{-- <input type="hidden" id="role" name="role" value="0"> --}}
                                        <!-- Submit button -->
                                        <div class="row">
                                            <div class="col">
                                                {{-- <button type="submit" class="btn btn-lg mt-2 px-5 mb-4 text-light"
                                                    style="background-color: #4FBEAB; width:100%">Rutin Tiap Bulan
                                                </button> --}}
                                                <button type="submit" class="btn btn-lg mt-2 px-5 mb-4 text-light"
                                                    style="background-color: #4FBEAB; ">Hitung</button>
                                            </div>
                                            {{-- <div class="col">
                                                <a href="{{ route('item.simulasi2') }}" class="btn btn-lg mt-2 px-5 mb-4"
                                                    style="background-color: #F9FAFC; width:100%">Nabung Sekali</a>
                                            </div> --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="card shadow-custom mb-4" style="width:100%; border: 3px solid #4FBEAB;">
                                <!-- Card Body -->
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col">
                                            <p>Nilai yang di dapatkan hari ini</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <h1 class="text-gray-900" style="font-weight: 600;">
                                                {{ number_format($nilai, 0, ',', '.') }}</h1>
                                        </div>
                                    </div>

                                    {{-- <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1">
                                        <div class="col"></div>
                                        <div class="pb-2">
                                            <div>
                                                <p>Selama Berapa Tahun?</p>
                                            </div>
                                            <div class="d-sm-flex align-items-center justify-content-between">
                                                <a href="#" class="btn btn-sm mt-2 disabled"
                                                    style="background-color: #F9FAFC;"><i
                                                        class="fa fa-sm fa-angle-left text-gray-900"
                                                        aria-hidden="true"></i></a>
                                                <p class="mt-4">1 Tahun</p>
                                                <a href="#" class="btn btn-sm mt-2 btn-dark"
                                                    style=""><i
                                                        class="fa fa-sm fa-angle-right"
                                                        aria-hidden="true"></i></a>
                                            </div>

                                        </div>
                                    </div> --}}



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
