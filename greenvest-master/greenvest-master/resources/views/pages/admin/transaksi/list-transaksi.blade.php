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
                        <h1 class="h3 mb-0 text-gray-800 ">List Transaksi</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col">
                            <div class="card shadow-custom mb-4" style="width:100%">
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Nama User</th>
                                                    <th>Produk</th>
                                                    <th>Jenis Transaksi</th>
                                                    <th>Harga</th>
                                                    <th>Waktu</th>
                                                    <th>Kode Transaksi</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($list_transaksi as $item)
                                                    <tr class="" style="font-size: 14px">
                                                        <td>
                                                            <img class="avatar rounded-circle me-2"
                                                                @if ($image->where('produk_green_id', $item->produk_green->id)->pluck('image')->first() != null) src="{{ asset('img/produk/' .$image->where('produk_green_id', $item->produk_green->id)->pluck('image')->first()) }}"
                                                            @else
                                                                src="{{ asset('img/produk/default.png') }}" @endif
                                                                alt="" style="width:42px; height:42px">
                                                        </td>
                                                        <td>
                                                            {{ $item->user->nama_lengkap }}
                                                        </td>
                                                        <td>
                                                            {{ $item->produk_green->nama }}
                                                        </td>
                                                        <td class="">
                                                            {{ $item->jenis_transaksi }}
                                                        </td>
                                                        <td>
                                                            Rp{{ number_format($item->total_bayar, 0, ',', '.') }}
                                                        </td>
                                                        <td>
                                                            {{ $item->created_at->format('d F, Y, H:i') }}
                                                        </td>
                                                        <td>{{ $item->kode_transaksi }}</td>
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
                                                            <a href="{{ route('admin.edit.transaksi', ['id' => $item->id]) }}"
                                                                class="btn btn-sm btn-warning pr-4 pl-1">
                                                                Edit
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form
                                                                action="{{ route('admin.delete.transaksi', ['id' => $item->id]) }}"
                                                                method="POST" onclick="return confirm('Are you sure?')">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger pr-3 pl-1">Delete</button>
                                                            </form>
                                                        </td>
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
