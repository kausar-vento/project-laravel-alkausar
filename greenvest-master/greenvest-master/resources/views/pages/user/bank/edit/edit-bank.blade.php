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
                        <h1 class="h3 mb-0 text-gray-800 ">Edit Metode Pembayaran</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col">
                            <div class="card shadow-custom mb-4" style="width:100%">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <div class=" align-items-center justify-content-between">
                                        <h1 class="h4 mb-0 text-gray-800 ">Edit Akun</h1>
                                    </div>
                                </div>

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

                                    <form action="{{ route('bank.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $bank->id }}">
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                                        <div class="row d-flex">

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Pilih Bank / E Wallet</label>
                                                <select type="text" name="bank_name" class="form-control" autofocus
                                                    required>
                                                    <option value="BRIVA"
                                                        @if ($bank->bank_name == 'BRIVA') selected @endif>
                                                        BRIVA
                                                    </option>
                                                    <option value="BSI"
                                                        @if ($bank->bank_name == 'BSI') selected @endif>BSI
                                                    </option>
                                                    <option value="Mandiri"
                                                        @if ($bank->bank_name == 'Mandiri') selected @endif>Mandiri
                                                    </option>
                                                    <option value="BNI"
                                                        @if ($bank->bank_name == 'BNI') selected @endif>BNI
                                                    </option>
                                                    <option value="LinkAja"
                                                        @if ($bank->bank_name == 'LinkAja') selected @endif>LinkAja
                                                    </option>
                                                    <option value="GoPay"
                                                        @if ($bank->bank_name == 'GoPay') selected @endif>GoPay
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Nomor Akun</label>
                                                <input type="text" name="no_rekening" class="form-control" autofocus
                                                   value="{{ $bank->no_rekening }}" required>
                                            </div>
                                        </div>

                                        <!-- Submit button -->
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('bank') }}" class="btn btn-lg mt-2 px-5 mb-4"
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
