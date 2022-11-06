@extends('layouts.navbar_admin')

@section('navbar-admin')

<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Show Course</h6>
    </div>
        <div class="card-body">

            <h1>{{$dataCourse->judul_course}}</h1>
            <hr>
            <div style="max-height: 200px; overflow:hidden">
                <img src="{{asset('storage/' . $dataCourse->thumbnail)}}" alt="">
            </div>
            <hr>
            {!! $dataCourse->deskripsi !!}
            <hr>
            <h4>What will i learn</h4>
            {!! $dataCourse->dipelajarin !!}
            <hr>
            <h4>Requirements</h4>
            {!! $dataCourse->requirement !!}
            <hr>
            <h4>Quiality Course</h4>
            <div>
                @if ($dataCourse->top_course === "Normal")
                    <button type="button" class="btn btn-primary">{{$dataCourse->top_course}}</button>
                @else
                    <button type="button" class="btn btn-success">{{$dataCourse->top_course}}</button>
                @endif
            </div>
            <hr>
            <h4>Tujuan</h4>
            <h5>{{$dataCourse->tujuan}}</h5>
            <hr>
            <h4>{{$dataCourse->subcategory->nama_subcategory}}</h4>
            <a class="btn btn-danger" href="/admin-course">Back</a>
    </div>
</div>

@endsection
