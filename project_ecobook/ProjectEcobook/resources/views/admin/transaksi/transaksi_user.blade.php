@extends('layouts.navbar_admin')

@section('navbar-admin')

<h1 class="h3 mb-2 text-gray-800">Transaksi User</h1>

@if (session()->has('success'))
<br>
<div class="alert alert-success alert-dismissible fade show col-md-8" role="alert">
    {{ session('success') }}
</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Transaksi User</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Nama User</th>
                        <th>Bukti</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataT as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->user->first_name}}</td>
                        <td>{{$item->course->judul_course}}</td>
                        <td><img src="{{asset('storage/' . $item->bukti_upload)}}" width="190px"></td>
                        <td>
                            @if ($item->status == 1)
                            <button class="btn btn-warning text-light">Menunggu</button>
                            @elseif ($item->status == 2)
                            <button class="btn btn-success">Lunas</button>
                            @elseif ($item->status == 3)
                            <button class="btn btn-danger">Gagal</button>
                            @endif
                        </td>
                        <td>
                            @if ($item->status == 1)
                            <form action="{{route('admin.transaksiU.update', $item->id)}}" method="POST"
                                class="d-inline">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="status" value="2">
                                <button class="btn btn-success" type="submit">Lunas</button>
                            </form>
                            <form action="{{route('admin.transaksiU.update', $item->id)}}" method="POST"
                                class="d-inline">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="status" value="3">
                                <button class="btn btn-danger" type="submit">Gagal</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
