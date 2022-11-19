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
                        <h1 class="h3 text-gray-800 ">Metode Pembayaran</h1>
                        <a class="" href="{{ route('bank.create') }}">
                            <button class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add Item</span>
                            </button>
                        </a>
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
                                                    <th>Nama</th>
                                                    <th>Nomor Akun</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bank as $item)
                                                    <tr class="">
                                                        <td>
                                                            <img class="avatar rounded-circle me-2" @php
                                                                if ($item->bank_name == Str::contains($item->bank_name, 'BRIVA')) {
                                                                    echo 'src="'.asset('img/bank/BRIVA.png').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'BSI')) {
                                                                    echo 'src="'.asset('img/bank/BSI.jpg').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'Mandiri')) {
                                                                    echo 'src="'.asset('img/bank/Mandiri.png').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'BNI')) {
                                                                    echo 'src="'.asset('img/bank/BNI.png').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'LinkAja')) {
                                                                    echo 'src="'.asset('img/bank/LinkAja.png').'"';
                                                                } elseif ($item->bank_name == Str::contains($item->bank_name, 'GoPay')) {
                                                                    echo 'src="'.asset('img/bank/GoPay.png').'"';
                                                                } else {
                                                                    echo 'src="'.asset('img/item-b1.png').'"';
                                                                }
                                                            @endphp>
                                                        </td>
                                                        <td>
                                                            {{ $item->bank_name }}
                                                        </td>
                                                        <td>
                                                            {{ substr($item->no_rekening, 0, 3) . '******' . substr($item->no_rekening, strlen($item->no_rekening) - 3, 3) }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('bank.edit', ['id' => $item->id]) }}"
                                                                class="">
                                                                <button class="btn btn-sm btn-warning pr-5 pl-1"
                                                                    @if ($item->bank_name == 'GreenVest') )
                                                                    disabled style:"pointer-events: none;" @endif>
                                                                    Edit
                                                                </button>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('bank.delete', ['id' => $item->id]) }}"
                                                                @if ($item->bank_name != 'GreenVest') )
                                                                method="POST" onclick="return confirm('Are you sure?')" @endif>
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger pr-4 pl-1"
                                                                    @if ($item->bank_name == 'GreenVest') "
                                                                        disabled @endif>Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
