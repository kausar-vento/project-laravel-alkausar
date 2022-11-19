@extends('layouts.navbar_user')

@section('navbar-user')

<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".strawberry">Strawberry</li>
                        <li data-filter=".berry">Berry</li>
                        <li data-filter=".lemon">Lemon</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            @foreach ($allBuku as $item)
                <div class="col-lg-4 col-md-6 text-center strawberry">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="{{route('user.getProductBuku', $item->id)}}"><img src="{{asset('user/assets/img/products/product-img-1.jpg')}}" alt=""></a>
                        </div>
                        <h3>{{$item->nama_buku}}</h3>
                        <p class="product-price">Rp. @currency($item->harga_buku)</p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-end">
            {{$allBuku->links()}}
        </div>
    </div>
</div>

@endsection
