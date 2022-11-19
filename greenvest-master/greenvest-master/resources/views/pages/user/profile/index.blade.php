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
                        <h1 class="h3 mb-0 text-gray-800 ">Edit Profile</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col">
                            <div class="card shadow-custom mb-4" style="width:100%">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <div class=" align-items-center justify-content-between">
                                        <h1 class="h4 mb-0 text-gray-800 ">
                                            {{ $user->nama_lengkap }}</h1>
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

                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif


                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row d-flex">
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Nama Lengkap</label>
                                                <input type="text" name="nama_lengkap" class="form-control"
                                                    value="{{ $user->nama_lengkap }}" autofocus required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control"
                                                    value="{{ $user->username }}" autofocus disabled>
                                            </div>
                                        </div>

                                        <div class="row d-flex">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ $user->email }}" autofocus required>
                                            </div>

                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Nomor HP</label>
                                                <input type="text" name="nohp" class="form-control"
                                                    value="{{ $user->nohp }}" autofocus required>
                                            </div>
                                        </div>

                                        <hr class="sidebar-divider">

                                        <div class="row d-flex">
                                            <div class="col-sm form-outline mb-4">
                                                <label class="form-label">Ganti Password</label>
                                                <input type="password" name="password" class="form-control" value=""
                                                    autofocus>
                                            </div>
                                        </div>

                                        <hr class="sidebar-divider">

                                        <p style="font-size: 12px">*Image (<span class="">Optional</span>)</p>
                                        <label class="form-label">Foto Profile: </label>
                                        <div class="row d-flex">
                                            <div class="col-sm form-outline mb-4">
                                                <img class="avatar rounded-circle mb-2 mr-1"
                                                    @if (isset($user_image)) src="{{ asset('img/profile/' . $user_image->image) }}"
                                                @else
                                                src="{{ asset('img/item-sample2.png') }}" @endif
                                                    alt="" style="width:42px; height:42px">
                                                <input type="file" name="profile_photo" class="form-input" autofocus>
                                            </div>
                                        </div>

                                        <!-- Submit button -->
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ url()->previous() }}" class="btn btn-lg mt-2 px-5 mb-4"
                                                    style="background-color: #F9FAFC; width:100%">Cancel</a>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-lg mt-2 px-5 mb-4 text-light"
                                                    style="background-color: #4FBEAB; width:100%">Update</button>
                                            </div>
                                        </div>
                                    </form>
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
