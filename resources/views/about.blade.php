@extends('layouts.master~')
@section('content')


    <div class="col-lg-8 offset-lg-2 text-center mt-5">
        <div class="section-title">
            <h3><span class="orange-text">Some</span>Review</h3>
        </div>
    </div>

	<div class="testimonail-section mt-80 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
                        @foreach ($reviews as $item)

						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>{{$item->name}}<span>{{$item->subject}}</span></h3>
								<p class="testimonial-body">
									" {{$item->message}} "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
                        @endforeach
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection
