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
                        <h1 class="h3 mb-0 text-gray-800 ">Edit Item</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col">
                            <div class="card shadow-custom mb-4" style="width:100%">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <div class=" align-items-center justify-content-between">
                                        <h1 class="h4 mb-0 text-gray-800 ">Item:
                                            {{ $this_item->nama }}</h1>
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

                                    <form action="{{ route('admin.item') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{-- {{ $this_item->id }} --}}
                                        <input type="hidden" name="id" value="{{ $this_item->id }}">

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
                                                <input type="text" name="nama" class="form-control"
                                                    value="{{ $this_item->nama }}" autofocus required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Perusahaan<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required</p>
                                                    </span></label>
                                                <input type="text" name="perusahaan" class="form-control"
                                                    value="{{ $this_item->perusahaan }}" autofocus required>
                                            </div>
                                        </div>

                                        <div class="row d-flex">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Jenis Green<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required</p>
                                                    </span></label>
                                                <select type="text" name="green_id" class="form-control" autofocus
                                                    required>
                                                    <option value="1"
                                                        @if ($this_item->green_id == 1) selected @endif>Green Sukuk
                                                    </option>
                                                    <option value="2"
                                                        @if ($this_item->green_id == 2) selected @endif>Green Bond
                                                    </option>
                                                    <option value="3"
                                                        @if ($this_item->green_id == 3) selected @endif>Green Taxonomy
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Jenis Produk<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required</p>
                                                    </span></label>
                                                <input type="text" name="jenis_produk" class="form-control"
                                                    value="{{ $this_item->jenis_produk }}" autofocus required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Kategori<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required</p>
                                                    </span></label>
                                                <select type="text" name="kategori" class="form-control" autofocus
                                                    required>
                                                    <option value="Green"
                                                        @if ($this_item->kategori == 'Green') selected @endif>Green
                                                    </option>
                                                    <option value="Yellow"
                                                        @if ($this_item->kategori == 'Yellow') selected @endif>Yellow
                                                    </option>
                                                    <option value="Red"
                                                        @if ($this_item->kategori == 'Red') selected @endif>Red
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Tingkat Risiko<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required</p>
                                                    </span></label>
                                                <select type="text" name="tingkat_risiko" class="form-control" autofocus
                                                    required>
                                                    <option value="Tinggi"
                                                        @if ($this_item->tingkat_risiko == 'Tinggi') selected @endif>
                                                        Tinggi
                                                    </option>
                                                    <option value="Sedang"
                                                        @if ($this_item->tingkat_risiko == 'Sedang') selected @endif>
                                                        Sedang
                                                    </option>
                                                    <option value="Rendah"
                                                        @if ($this_item->tingkat_risiko == 'Rendah') selected @endif>
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
                                                <input type="text" name="laba" class="form-control"
                                                    @if (isset($dummy_laba)) value=" {{ $dummy_laba->laba }}"
                                                    @else
                                                        placeholder="Belum Ada Data" @endif
                                                    autofocus required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Year Return / Divided Yield (%)<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="year_return" class="form-control"
                                                    value="{{ $this_item->year_return }}" autofocus required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Total AUM / Market Cap (IDR)<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="total_aum" class="form-control"
                                                    value="{{ $this_item->total_aum }}" autofocus required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Previous Closing (IDR)<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="pre_close" class="form-control"
                                                    value="{{ $this_item->pre_close }}" autofocus required>
                                            </div>
                                        </div>

                                        <div class="row d-flex">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Jatuh Tempo (Hari) <span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="jatuh_tempo" class="form-control"
                                                    value="{{ $this_item->jatuh_tempo }}" autofocus required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Minimal Pembelian (IDR)<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="min_pembelian_produk" class="form-control"
                                                    value="{{ $this_item->min_pembelian_produk }}" autofocus required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Biaya Pembelian (IDR)<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="biaya_pembelian" class="form-control"
                                                    value="{{ $this_item->biaya_pembelian }}" autofocus required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Biaya Penjualan (IDR)<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required | numeric
                                                        </p>
                                                    </span></label>
                                                <input type="text" name="biaya_penjualan" class="form-control"
                                                    value="{{ $this_item->biaya_penjualan }}" autofocus required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Biaya Penampung<span>
                                                        <p class="text-danger" style="font-size: 12px">*Required</p>
                                                    </span></label>
                                                <select type="text" name="biaya_penampung" class="form-control"
                                                    autofocus required>
                                                    <option value="Standard Centered"
                                                        @if ($this_item->tingkat_risiko == 'Standard Centered') selected @endif>
                                                        Standard Centered
                                                    </option>
                                                    <option value="Management Investment"
                                                        @if ($this_item->tingkat_risiko == 'Management Investment') selected @endif>
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
                                                <input type="text" name="ticker" class="form-control"
                                                    @if (isset($google_finance)) value="{{ $google_finance->ticker }}"
                                                    @else
                                                        placeholder="Belum Ada Data" @endif
                                                    autofocus>
                                            </div>
                                        </div>

                                        <hr class="sidebar-divider">

                                        <p style="font-size: 12px">*Manual Monthly Closing Input (<span
                                                class="text-primary">Recommended for Dummy Data Graph</span>)</p>
                                        <div class="row d-flex">

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Jan</label>
                                                <input type="text" name="jan" class="form-control"
                                                    @if (isset($charttest)) value="{{ $charttest->jan }}" @endif
                                                    autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Feb</label>
                                                <input type="text" name="feb" class="form-control"
                                                    @if (isset($charttest)) value="{{ $charttest->feb }}" @endif
                                                    autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Mar</label>
                                                <input type="text" name="mar" class="form-control"
                                                    @if (isset($charttest)) value="{{ $charttest->mar }}" @endif
                                                    autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Apr</label>
                                                <input type="text" name="apr" class="form-control"
                                                    @if (isset($charttest)) value="{{ $charttest->apr }}" @endif
                                                    autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">May</label>
                                                <input type="text" name="may" class="form-control"
                                                    @if (isset($charttest)) value="{{ $charttest->may }}" @endif
                                                    autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Jun</label>
                                                <input type="text" name="jun" class="form-control"
                                                    @if (isset($charttest)) value="{{ $charttest->jun }}" @endif
                                                    autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Jul</label>
                                                <input type="text" name="jul" class="form-control"
                                                    @if (isset($charttest)) value="{{ $charttest->jul }}" @endif
                                                    autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Aug</label>
                                                <input type="text" name="aug" class="form-control"
                                                    @if (isset($charttest)) value="{{ $charttest->aug }}" @endif
                                                    autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Sep</label>
                                                <input type="text" name="sep" class="form-control"
                                                    @if (isset($charttest)) value="{{ $charttest->sep }}" @endif
                                                    autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Oct</label>
                                                <input type="text" name="oct" class="form-control"
                                                    @if (isset($charttest)) value="{{ $charttest->oct }}" @endif
                                                    autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Nov</label>
                                                <input type="text" name="nov" class="form-control"
                                                    @if (isset($charttest)) value="{{ $charttest->nov }}" @endif
                                                    autofocus>
                                            </div>

                                            <div class="col-sm-3 form-outline mb-4">
                                                <label class="form-label">Dec</label>
                                                <input type="text" name="dec" class="form-control"
                                                    @if (isset($charttest)) value="{{ $charttest->dec }}" @endif
                                                    autofocus>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Year</label>
                                                <input type="text" name="year" class="form-control"
                                                    @if (isset($charttest)) value="{{ $charttest->year }}" @endif
                                                    autofocus>
                                            </div>
                                        </div>

                                        <hr class="sidebar-divider">

                                        <p style="font-size: 12px">*Image (<span class="">Optional</span>)</p>
                                        <label class="form-label">Produk Image: </label>
                                        <div class="row d-flex">
                                            <div class="col-sm form-outline mb-4">
                                                <img class="avatar mb-2 mr-1"
                                                    @if (isset($image)) src="{{ asset('img/produk/' . $image->image) }}"
                                                    @else
                                                        src="{{ asset('img/produk/default.png') }}" @endif
                                                    alt="" style="width:42px; height:42px">
                                                <input type="file" name="image" class="form-input" autofocus>
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
                                                    style="background-color: #4FBEAB; width:100%">Update</button>
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
