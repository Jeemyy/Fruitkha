@extends('layouts.master')
@section('content')
<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Billing Address
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="{{route('product.storeOrder')}}" method="POST">
                                        @csrf
						        		<p><input type="text" placeholder="Name" name="name" id="name"></p>
						        		<p><input type="email" placeholder="Email" name="email" id="email"></p>
						        		<p><input type="text" placeholder="Address" name="address" id="address"></p>
						        		<p><input type="tel" placeholder="Phone" name="phone" id="phone"></p>
						        		<p><textarea name="note" id="note" cols="30" rows="10" placeholder="Note..."></textarea></p>
                                        <input type="submit">
						        	</form>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Card Details
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
						      <div class="card-body">
						        <div class="card-details">

                                    <div class="cart-section mt-10 mb-10">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="cart-table-wrap">
                                                        <table class="cart-table">
                                                            <thead class="cart-table-head">
                                                                <tr class="table-head-row">
                                                                    <th class="product-remove"></th>
                                                                    <th class="product-image">Product Image</th>
                                                                    <th class="product-name">Name</th>
                                                                    <th class="product-price">Price</th>
                                                                    <th class="product-quantity">Quantity</th>
                                                                    <th class="product-total">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($carts as $item)
                                                                <tr class="table-body-row">
                                                                    <td class="product-remove"><a href="{{route('cart.remove', $item->id)}}"><i class="far fa-window-close"></i></a></td>
                                                                    <td class="product-image"><img src="{{asset($item->product->imagepath)}}" alt="" style="min-width: 100px !important"></td>
                                                                    <td class="product-name"><a href="{{route('product.single',$item->id)}}">{{$item->product->name}}</a></td>
                                                                    <td class="product-price">${{$item->product->price}}</td>
                                                                    <td class="product-quantity">{{$item->quantity}}</td>
                                                                    <td class="product-total">${{$item->product->price * $item->quantity}}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


						        </div>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
