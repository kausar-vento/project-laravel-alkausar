@extends('layouts.navbar_admin')

@section('navbar-admin')

<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create SubCategory</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('admin-subcategory.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama SubCategory</label>
                <input type="text" name="nama_subcategory" value="{{old('nama_subcategory')}}"
                    class="form-control @error('nama_subcategory') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('nama_subcategory')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Category</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="id_category">
                    <option selected>Choose...</option>
                    @foreach ($category as $item)
                    <option value="{{$item->id}}">{{$item->nama_category}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-danger" href="/admin-subcategory">Cancel</a>
        </form>
    </div>

    @endsection
