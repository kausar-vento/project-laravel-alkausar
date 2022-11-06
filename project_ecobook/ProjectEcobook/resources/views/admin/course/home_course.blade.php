@extends('layouts.navbar_admin')

@section('navbar-admin')

<h1 class="h3 mb-2 text-gray-800">Data Course</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Course</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Course</th>
                        <th>Category</th>
                        <th>Level Course</th>
                        <th>Harga Langganan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($course as $item)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{$item->judul_course}}</td>
                        <td>{{$item->subcategory['nama_subcategory']}}</td>
                        <td>{{$item->level}}</td>
                        <td>{{$item->harga_langganan}}</td>
                        <td>
                            <a class="btn btn-secondary" href="{{route('admin-course.show', $item->id)}}">Show</a>
                            <a class="btn btn-primary" href="{{route('admin.course.edit', $item->id)}}">Edit</a>
                            <form action="{{route('admin-course.destroy', $item->id)}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin Ingin Hapus Course Ini?')">Hapus</button>
                            </form>
                            <a class="btn btn-light" href="{{route('admin.home.materiCourse', $item->id)}}">Materi</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
    @endif

</div>

@endsection
