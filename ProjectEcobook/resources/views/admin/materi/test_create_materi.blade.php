@extends('layouts.navbar_admin')

@section('navbar-admin')

<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create Materi</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.home.postMateriCourse')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Materi</label>
                <input type="text" name="nama_materi" value="{{ old('nama_materi')}}"
                    class="form-control @error('nama_materi') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('nama_materi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <input type="hidden" name="course_id" value="{{$dataCo->id}}">
            <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <input id="deskripsi" type="hidden" name="deskripsi" value="{{old('deskripsi')}}">
                <trix-editor input="deskripsi"></trix-editor>
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Link YT</label>
                <input type="text" name="link_yt" value="{{ old('link_yt')}}"
                    class="form-control @error('link_yt') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('link_yt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Dokumen PDF</label>
                <input type="file" name="dokumen_pdf" value="{{ old('dokumen_pdf')}}"
                    class="form-control @error('dokumen_pdf') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('dokumen_pdf')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
            <a class="btn btn-success" href="/admin/course/materi/{{$dataCo->id}}">Kembali</a>
        </form>
    </div>
    @endsection
