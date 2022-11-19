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
                        <h1 class="h3 mb-0 text-gray-800 ">Add Item</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col">
                            <div class="card shadow-custom mb-4" style="width:100%">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <div class=" align-items-center justify-content-between">
                                        <h1 class="h4 mb-0 text-gray-800 ">Tambah Produk</h1>
                                    </div>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body">

                                    {{-- {{ $this_item->user->nama_lengkap }}
                                    {{ $this_item->produk_green->nama }}
                                    {{ $this_item->total_bayar }}
                                    {{ $this_item->jenis_transaksi }}
                                    {{ $this_item->tanggal }}
                                    {{ $this_item->status }} --}}

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('admin.store.item') }}" method="POST">
                                        @csrf
                                        {{-- {{ $this_item->id }} --}}
                                        {{-- <input type="hidden" name="id" value="{{ $this_item->id }}"> --}}

                                        <div class="row d-flex">
                                            {{-- <div class="col-sm form-outline mb-4">
                                                <label class="form-label">ID</label>
                                                <input type="text" name="id" class="form-control"
                                                    value="{{ $this_item->id }}" autofocus disabled>
                                            </div> --}}
                                            {{-- @php
                                                dd($this_item->id);
                                            @endphp --}}

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Nama Produk<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required</p>
                                                    </span></label>
                                                <input type="text" name="nama" class="form-control" autofocus
                                                    required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Perusahaan<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required</p>
                                                    </span></label>
                                                <input type="text" name="perusahaan" class="form-control" autofocus
                                                    required>
                                            </div>
                                        </div>

                                        <div class="row d-flex">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Jenis Green<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required</p>
                                                    </span></label>
                                                <select type="text" name="green_id" class="form-control" autofocus
                                                    required>
                                                    <option value="1">Green Sukuk
                                                    </option>
                                                    <option value="2">Green Bond
                                                    </option>
                                                    <option value="3">Green Taxonomy
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Jenis Produk<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required</p>
                                                    </span></label>
                                                <input type="text" name="jenis_produk" class="form-control" autofocus
                                                    required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Kategori<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required</p>
                                                    </span></label>
                                                <select type="text" name="kategori" class="form-control" autofocus
                                                    required>
                                                    <option value="Green">Green
                                                    </option>
                                                    <option value="Yellow">Yellow
                                                    </option>
                                                    <option value="Red">Red
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Tingkat Risiko<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required</p>
                                                    </span></label>
                                                <select type="text" name="tingkat_risiko" class="form-control" autofocus
                                                    required>
                                                    <option value="Tinggi">
                                                        Tinggi
                                                    </option>
                                                    <option value="Sedang">
                                                        Sedang
                                                    </option>
                                                    <option value="Rendah">
                                                        Rendah
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row d-flex">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Laba (%)<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="laba" class="form-control" autofocus
                                                    required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Year Return / Divided Yield (%)<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="year_return" class="form-control" autofocus
                                                    required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Total AUM / Market Cap (IDR)<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="total_aum" class="form-control" autofocus
                                                    required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Previous Closing (IDR)<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="pre_close" class="form-control" autofocus
                                                    required>
                                            </div>
                                        </div>

                                        <div class="row d-flex">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Jatuh Tempo (Hari) <span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="jatuh_tempo" class="form-control" autofocus
                                                    required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Minimal Pembelian (IDR)<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="min_pembelian_produk" class="form-control"
                                                    autofocus required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Biaya Pembelian (IDR)<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="biaya_pembelian" class="form-control"
                                                    autofocus required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Biaya Penjualan (IDR)<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="biaya_penjualan" class="form-control"
                                                    autofocus required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Biaya Penampung<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required</p>
                                                    </span></label>
                                                <select type="text" name="biaya_penampung" class="form-control"
                                                    autofocus required>
                                                    <option value="Standard Centered">
                                                        Standard Centered
                                                    </option>
                                                    <option value="Management Investment">
                                                        Management Investment
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <hr class="sidebar-divider">

                                        <p style="font-size: 12px">*Google Finance API (Optional)</p>
                                        <div class="row d-flex">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Product Ticker</label>
                                                <input type="text" name="ticker" class="form-control" autofocus>
                                            </div>
                                        </div>

                                        <hr class="sidebar-divider">

                                        <p style="font-size: 12px">*Manual Monthly Closing Input (<span
                                                class="text-primary">Recommended for Dummy Data Graph</span>)</p>
                                        <div class="row d-flex">

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Jan</label>
                                                <input type="text" name="jan" class="form-control" autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Feb</label>
                                                <input type="text" name="feb" class="form-control" autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Mar</label>
                                                <input type="text" name="mar" class="form-control" autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Apr</label>
                                                <input type="text" name="apr" class="form-control" autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">May</label>
                                                <input type="text" name="may" class="form-control" autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Jun</label>
                                                <input type="text" name="jun" class="form-control" autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Jul</label>
                                                <input type="text" name="jul" class="form-control" autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Aug</label>
                                                <input type="text" name="aug" class="form-control" autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Sep</label>
                                                <input type="text" name="sep" class="form-control" autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Oct</label>
                                                <input type="text" name="oct" class="form-control" autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Nov</label>
                                                <input type="text" name="nov" class="form-control" autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Dec</label>
                                                <input type="text" name="dec" class="form-control" autofocus>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Year</label>
                                                <input type="text" name="year" class="form-control" autofocus>
                                            </div>
                                        </div>

                                        <!-- Submit button -->
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('admin.item') }}" class="btn btn-lg mt-2 px-5 mb-4"
                                                    style="background-color: #F9FAFC; width:100%">Cancel</a>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-lg mt-2 px-5 mb-4 text-light"
                                                    style="background-color: #4FBEAB; width:100%">Create</button>
                                            </div>
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
