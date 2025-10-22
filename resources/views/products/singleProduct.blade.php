@extends('layouts.master')
@section('content')
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                @if ($product->productImage->count() > 1)
                    <div class="col-md-5">
                        <div class="testimonial-sliders">
                            @foreach ($product->productImage as $item)
                                <div class="single-testimonial-slider">
                                    <div class="client-avater">
                                        <img src="{{ asset($item->imagepath) }}" alt=""
                                            style="min-width: 25rem;
                                                height: 20rem;
                                                max-width: 100px;
                                                border-radius: 5%;
                                            ">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="col-md-3">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>
                        <p style="font-size: 15px; font-weight: 700 ">Price: ${{ $product->price }}</p>
                        <p><strong>Categories: </strong>{{ $product->Category->name }}</p>
                        <div class="single-product-form">
                            <p class="single-product-pricing"><span>Quantity: {{ $product->quantity }}</span></p>
                            <a href="{{ route('cart.add', $product->id) }}" class="cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <p>Related Product</p>
        <div class="row">
            @foreach ($relatedProduct as $item)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="{{route('product.single', $item->id)}}"><img src="{{url($item->imagepath)}}" style="min-height: 250px; max-height: 250px !important" alt=""></a>
						</div>
						<h3>{{$item->name}}</h3>
						<p class="product-price"><span>{{$item->quantity}}</span> {{$item->price}}$ </p>
                        <div>
                            <a href="{{route('cart.add', $item->id)}}" class="cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
					</div>
				</div>

                @endforeach


        </div>
    </div>
@endsection
