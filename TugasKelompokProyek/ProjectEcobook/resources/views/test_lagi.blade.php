@extends('layouts.navbar_user')

@section('navbar-user')

<!-- products -->
<div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <form action="/home/user/product/allBuku">
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04" name="cate"
                            aria-label="Example select with button addon">
                            @foreach ($dataC as $item3)
                                <option value="{{$item3->id}}">{{$item3->nama_category}}</option>
                            @endforeach   
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary" submit="button">Cari Kategori</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<div class="sembunyi">
    <div id="2" class="div2"><h1>Test2</h1></div>
    <div id="3" class="div2"><h1>Test3</h1></div>
    <div id="4" class="div2"><h1>Test4</h1></div>
    <div class="lol"></div>
    
</div>

<script src="{{asset('user/assets/js/jquery-1.11.3.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('select[name="cate"]').on('change', function() {
            $(".div2").hide();
            $("#" + $(this).val()).fadeIn(700);
        }).change();
    });
</script>

@endsection
