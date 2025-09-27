
@extends('layouts.master')
@section('content')
@if (Auth::check())
<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Add</span> Products</h3>
					</div>
				</div>
			</div>

			<div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Have you any question?</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, ratione! Laboriosam est, assumenda. Perferendis, quo alias quaerat aliquid. Corporis ipsum minus voluptate? Dolore, esse natus!</p>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data" id="fruitkha-contact" onsubmit="return valid_datas( this );">
                            @csrf
							<p>
								<input type="text"  placeholder="Name" name="name" id="name" style="width: 100%" value="{{old('name')}}">
                                <span class="text-danger">
                                    @error('name')
                                        {{$message}}
                                    @enderror
                                </span>
							</p>
							<p style="display: flex;">
								<input type="number"  placeholder="Price" name="price" id="price" style="width: 50%;" class="mr-3" value="{{old('price')}}">
                                                                <span class="text-danger">
                                    @error('price')
                                        {{$message}}
                                    @enderror
                                </span>

								<input type="number"  placeholder="Quantity" name="quantity" id="quantity" style="width: 50%;" value='{{old('quantity')}}'>
                                                                <span class="text-danger">
                                    @error('quantity')
                                        {{$message}}
                                    @enderror
                                </span>

							</p>
							<p><textarea  name="description" id="description" cols="30" rows="10" placeholder="Description">{{old('description')}}</textarea>
                                                            <span class="text-danger">
                                    @error('description')
                                        {{$message}}
                                    @enderror
                                </span>
                            </p>
                            <p>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($allcategories as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <span>
                                    @error('category_id')
                                        {{$message}}
                                    @enderror
                                </span>
                            </p>
                            <p>
                                <input type="file" name="photo" id="photo" alt="" class="form-contorl">
                            </p>
							<input type="hidden" name="token" value="FsWga4&amp;@f6aw">
							<p><input type="submit" value="Submit"></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@else
 <div class="card mt-5 mb-5 container " style="width: 25rem; display:flex; justify-content:center; align-items:center"
>
  <img src="{{asset('alert.jpg')}}" class="card-img-top" alt="..." style="min-width: 250px !important">
  <div class="card-body">
    <h5 class="card-title">Sorry You Can't Do This Action Before</h5>
    <p class="card-text">You should take some permission to buy the car you can go to can create your profile acount and give your passpor</p>
  </div>
</div>
@endif
@endsection
