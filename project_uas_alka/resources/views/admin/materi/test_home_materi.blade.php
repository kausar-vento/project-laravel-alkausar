@extends('layouts.navbar_admin')

@section('navbar-admin')

<h1 class="h3 mb-2 text-gray-800">Data Materi</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
       <a href="{{route('admin.home.createMateriCourse', $dataC->id)}}"><h6 class="m-0 font-weight-bold text-primary">Create Materi</h6></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Materi</th>
                        <th>Judul Course</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataM as $item)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{$item->nama_materi}}</td>
                        <td>{{$item->course['judul_course']}}</td>
                        <td>
                            <form action="{{route('admin.home.editMateriCourse', $item->id)}}" method="get" class="d-inline">
                                @csrf
                                <input type="hidden" name="id_course" value="{{$dataC->id}}">
                                <button class="btn btn-primary" >Edit</button>
                            </form>
                            <form action="{{route('admin.home.deleteMateriCourse', $item->id)}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="id_course" value="{{$dataC->id}}">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin Ingin Hapus Materi Ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a class="btn btn-primary" href="/admin-course">Kembali</a>
    </div>
   

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

</div>

@endsection
