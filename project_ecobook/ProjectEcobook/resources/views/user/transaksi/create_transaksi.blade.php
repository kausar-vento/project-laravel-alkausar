@extends('layouts.navbar_user')

@section('navbar-user')
<link rel="stylesheet" type="text/css" href="{{asset('user/css/slick.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('user/css/slick-theme.css')}}">

<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-7 mt-5">
                <form action="{{route('user.pTransaksi')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h1 class="h2">Form Pembayaran Kelas</h1>
                            </center>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="{{Auth::user()->first_name}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="{{Auth::user()->last_name}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Kelas</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="{{$dCourse->judul_course}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Total Harga</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="{{$dCourse->harga_langganan}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Transfer Rekening BNI</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="000773198321" disabled>
                            </div>
                            <input type="hidden" name="course_id" value="{{$dCourse->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="status" value="1">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Bukti Transaksi</label>
                                <input class="form-control" type="file" id="uploadBukti" onchange="previewImage()" name="bukti_upload">
                                <img class="img-preview img-fluid mb-3 mt-3 col-sm-5">
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <a class="btn btn-danger btn-lg"
                                        href="{{route('user.readMore', $dCourse->id)}}">Kembali</a>
                                </div>
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function previewImage()
    {
        const image = document.querySelector('#uploadBukti');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    
</script>

@endsection
