@extends('layouts.navbar_admin')

@section('navbar-admin')

<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create Course</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin-course.update', $data->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Judul Course</label>
                <input type="text" name="judul_course" value="{{ old('judul_course', $data->judul_course)}}"
                    class="form-control @error('judul_course') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('judul_course')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <input id="deskripsi" type="hidden" name="deskripsi" value="{{old('deskripsi', $data->deskripsi)}}">
                <trix-editor input="deskripsi"></trix-editor>
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Requirement For Course</label>
                <input id="requirement" type="hidden" name="requirement" value="{{old('requirement', $data->requirement)}}">
                <trix-editor input="requirement"></trix-editor>
                @error('requirement')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Hal - Hal Dipelajari</label>
                <input id="dipelajarin" type="hidden" name="dipelajarin" value="{{old('dipelajarin', $data->dipelajarin)}}">
                <trix-editor input="dipelajarin"></trix-editor>
                @error('dipelajarin')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <select class="form-control" name="id_subcategory" id="exampleFormControlSelect1">
                    <option selected>Chose..</option>
                    @foreach ($subcategory as $item)
                    @if (old('id_subcategory', $data->id_subcategory) == $item->id)
                    <option value="{{$item->id}}" selected>{{$item->nama_subcategory}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->nama_subcategory}}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Level Course</label>
                <select class="form-control" name="level" id="exampleFormControlSelect1">
                    <option value="{{$data->level}}">{{$data->level}}</option>
                    <option>===============</option>
                    <option value="Beginer">Beginer</option>
                    <option value="Advance">Advance</option>
                    <option value="Profesional">Profesional</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Tujuan Course</label>
                <input type="text" name="tujuan" value="{{ old('tujuan', $data->tujuan)}}"
                    class="form-control @error('tujuan') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('tujuan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Cover Course</label>
                <input type="hidden" name="oldThumbnail" value="{{$data->thumbnail}}">
                @if ($data->thumbnail)
                    <img src="{{asset('storage/' . $data->thumbnail)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input type="file" name="thumbnail" value="{{ old('thumbnail')}}"
                    class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail"
                    aria-describedby="emailHelp" onchange="previewImage()">
                @error('thumbnail')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Quality Course</label>
                <select class="form-control" name="top_course" id="exampleFormControlSelect1">
                    <option value="{{$data->top_course}}">{{$data->top_course}}</option>
                    <option>===============</option>
                    <option value="Normal">Normal Course</option>
                    <option value="Top">Top Course</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Biaya Langganan</label>
                <input type="number" name="harga_langganan" value="{{ old('harga_langganan', $data->harga_langganan)}}"
                    class="form-control @error('harga_langganan') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('harga_langganan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <input type="hidden" name="id_admin" value="{{$data->id_admin}}">
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>

    <script>
        function previewImage()
        {
            const image = document.querySelector('#thumbnail');
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
