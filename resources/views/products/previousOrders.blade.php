@extends('layouts.master')
@section('content')
<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
                @php
                    $count = 1
                @endphp

				<div class="col-lg-12">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
                        @foreach ($orders as $item)
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Order Number {{$count++}}
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="{{route('product.storeOrder')}}" method="POST">
                                        @csrf
						        		<p><input type="text" placeholder="Name" name="name" id="name" value="{{$item->name}}"></p>
						        		<p><input type="email" placeholder="Email" name="email" id="email" value="{{$item->email}}"></p>
						        		<p><input type="text" placeholder="Address" name="address" id="address" value="{{$item->address}}"></p>
						        		<p><input type="tel" placeholder="Phone" name="phone" id="phone" value="{{$item->phone}}"></p>
						        		<p><textarea name="note" id="note" cols="30" rows="10" placeholder="Note..." value="{{$item->note}}"></textarea></p>
                                        <input type="submit">
						        	</form>
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
                                        <div class="container">vct5
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
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
                                                                @foreach ($item->orderdetails as $detail)
                                                                <tr class="table-body-row">
                                                                        <td class="product-remove"><a href="{{route('cart.remove', $detail->id)}}"><i class="far fa-window-close"></i></a></td>
                                                                    <td class="product-image"><img src="{{asset($detail->product->imagepath)}}" alt="" style="min-width: 100px !important"></td>
                                                                    <td class="product-name"><a href="{{route('product.single',$detail->id)}}">{{$detail->product->name}}</a></td>
                                                                    <td class="product-price">${{$detail->product->price}}</td>
                                                                    <td class="product-quantity">{{$detail->quantity}}</td>
                                                                    <td class="product-total">${{$detail->product->price * $detail->quantity}}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="total-section">
                                                        <table class="total-table">
                                                            <thead class="total-table-head">
                                                                <tr class="table-total-row">
                                                                    <th>Total</th>
                                                                    <th>Price</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="total-data">
                                                                    <td><strong>Total: </strong></td>
                                                                    <td>{{$item->orderdetails->sum(function($x){ return $x->product->price * $x->quantity;})}}</td>
                                                                </tr>
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
                    @endforeach
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
@endsection
