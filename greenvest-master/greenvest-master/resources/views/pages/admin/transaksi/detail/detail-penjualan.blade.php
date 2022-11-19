@extends('layouts.core')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('Partials.sidebardev')
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
                        <h1 class="h3 mb-0 text-gray-800 ">Update Transaksi</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col">
                            <div class="card shadow-custom mb-4" style="width:100%">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <div class=" align-items-center justify-content-between">
                                        <h1 class="h4 mb-0 text-gray-800 ">Transaksi
                                            {{ $this_transaksi->jenis_transaksi }}</h1>
                                    </div>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body">

                                    {{-- {{ $this_transaksi->user->nama_lengkap }}
                                    {{ $this_transaksi->produk_green->nama }}
                                    {{ $this_transaksi->total_bayar }}
                                    {{ $this_transaksi->jenis_transaksi }}
                                    {{ $this_transaksi->tanggal }}
                                    {{ $this_transaksi->status }} --}}

                                    <form action="{{ route('admin.accept.penjualan') }}" method="POST">
                                        @csrf
                                        {{-- {{ $this_transaksi->id }} --}}
                                        <input type="hidden" name="id" value="{{ $this_transaksi->id }}">
                                        <input type="hidden" name="user_id" value="{{ $this_transaksi->user->id }}">
                                        <div class="form-outline mb-4">
                                            <label class="form-label">Nama Investor</label>
                                            <input type="text" name="" class="form-control"
                                                value="{{ $this_transaksi->user->nama_lengkap }}" autofocus disabled>
                                        </div>

                                        <div class="row d-flex">
                                            <input type="hidden" name="produk_green_id"
                                                value="{{ $this_transaksi->produk_green->id }}">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Nama Produk</label>
                                                <input type="text" name="" class="form-control"
                                                    value="{{ $this_transaksi->produk_green->nama }}" autofocus disabled>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Jenis Green</label>
                                                <input type="text" name="" class="form-control"
                                                    value="{{ $this_transaksi->produk_green->green->nama }}" autofocus
                                                    disabled>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Minimal Pembayaran</label>
                                                <input type="text" name="" class="form-control"
                                                    value="{{ $this_transaksi->produk_green->min_pembelian_produk }}"
                                                    autofocus disabled>
                                            </div>
                                        </div>

                                        <div class="row d-flex">

                                            <input type="hidden" name="bank_id" value="{{ $this_transaksi->bank->id }}">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Metode Pembayaran</label>
                                                <input type="text" name="" class="form-control"
                                                    value="{{ $this_transaksi->bank->bank_name }}" autofocus disabled>
                                            </div>

                                            <input type="hidden" name="total_bayar" value="{{ $this_transaksi->total_bayar }}">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Total Bayar</label>
                                                <input type="text" name="" class="form-control"
                                                    value="{{ $this_transaksi->total_bayar }}" autofocus disabled>
                                            </div>
                                        </div>

                                        <div class="row d-flex">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Waktu Transaksi</label>
                                                <input type="text" name="" class="form-control"
                                                    value="{{ $this_transaksi->created_at->format('d F, Y, H:i:s') }}"
                                                    autofocus disabled>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Status</label>
                                                <select type="text" name="status" class="form-control" autofocus
                                                    disabled>
                                                    <option value="Selesai"
                                                        @if ($this_transaksi->status == 'Selesai') selected @endif>Selesai</option>
                                                    <option value="Pending"
                                                        @if ($this_transaksi->status == 'Pending') selected @endif>Pending</option>
                                                    <option value="Menunggu Pembayaran"
                                                        @if ($this_transaksi->status == 'Menunggu Pembayaran') selected @endif>Menunggu
                                                        Pembayaran</option>
                                                    <option value="Dibatalkan"
                                                        @if ($this_transaksi->status == 'Dibatalkan') selected @endif>Dibatalkan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Submit button -->
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('admin.penjualan') }}" class="btn btn-lg mt-2 px-5 mb-4"
                                                    style="background-color: #F9FAFC; width:100%">Kembali</a>
                                            </div>
                                            @if ($this_transaksi->status != 'Selesai')
                                                <div class="col">
                                                    <button class="btn btn-lg mt-2 px-5 mb-4 text-light"
                                                        style="background-color: #4FBEAB; width:100%">Accept</button>
                                                </div>
                                            @endif

                                        </div>
                                    </form>
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
