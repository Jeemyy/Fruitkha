@extends('layouts.master')
@section('content')
<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($category as $item)
                            <li data-filter="._{{$item->id}}">{{$item->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
			<div class="row product-lists" style="position: relative; height: 4162.19px;">

            @foreach ($product as $item)
				<div class="col-lg-4 col-md-6 text-center  _{{$item->category_id}}" style="position: absolute; left: 0px; top: 0px;">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{url($item->imagepath)}}" alt="" style="min-width: 250px !important; min-height: 250px !important;"></a>
						</div>
						<h3>{{$item->name}}</h3>
						<p class="product-price"><span>Per Kg</span> {{$item->price}}$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>

            @endforeach
			</div>

			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
