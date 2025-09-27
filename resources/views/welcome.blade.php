@extends('layouts.master')
@section('title','Welcome Page')
@section('content')
<div class="product-section mt-150 mb-150">

		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">اقسام</span> الموقع</h3>
						<p>متعه التسوق من فروعنا</p>
					</div>
				</div>
			</div>

			<div class="row">
            @foreach ($categories as $index)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="{{route('product.id',$index->id)}}">
                                <img src="{{url($index->imagepath)}}" style="min-height: 250px; max-height: 250px !important" alt=""></a>
						</div>
						<h3>{{$index->name}}</h3>
                        <p>{{$index->discreption}}</p>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</div>



@endsection
