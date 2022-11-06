@extends('layouts.navbar_penjual')

@section('navbar-penjual')

<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Verifikasi Toko Anda</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin-course.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Lokasi Toko</label>
                <input id="lokasi" type="hidden" name="lokasi" value="{{old('lokasi')}}">
                <trix-editor input="lokasi"></trix-editor>
                @error('lokasi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Foto Toko</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input type="file" name="foto_toko" value="{{ old('foto_toko')}}"
                    class="form-control @error('foto_toko') is-invalid @enderror" id="foto_toko"
                    aria-describedby="emailHelp" onchange="previewImage()">
                @error('foto_toko')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Foto KTP</label>
                <img class="img-preview2 img-fluid mb-3 col-sm-5">
                <input type="file" name="ktp" value="{{ old('ktp')}}"
                    class="form-control @error('ktp') is-invalid @enderror" id="ktp"
                    aria-describedby="emailHelp" onchange="previewImage2()">
                @error('ktp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Sertefikat Toko</label>
                <img class="img-preview3 img-fluid mb-3 col-sm-5">
                <input type="file" name="sertefikat" value="{{ old('sertefikat')}}"
                    class="form-control @error('sertefikat') is-invalid @enderror" id="sertefikat"
                    aria-describedby="emailHelp" onchange="previewImage3()">
                @error('sertefikat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {{-- <input type="hidden" name="id_admin" value="{{Auth::guard('webadmin')->user()->id}}"> --}}
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector('#foto_toko');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    function previewImage2() {
        const image = document.querySelector('#ktp');
        const imgPreview = document.querySelector('.img-preview2');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    function previewImage3() {
        const image = document.querySelector('#sertefikat');
        const imgPreview = document.querySelector('.img-preview3');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection
