@extends('layouts.master')
@section('content')
<div class="container mt-5 mb-5" style="text-align: center">
    <form action="{{route('product.addImage')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mt-5 mb-5">
            <div class="col-9 pt-3">
                <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}" class="form-control col-12">
            </div>

            <div class="col-9 pt-3">
                <input type="file" name="photo" id="photo" class="form-control col-12">
            </div>
            <span>
                @error('photo')
                    {{$message}}
                @enderror
            </span>
            <div class="col-3">
              <input type="submit" class="w-100" value="Enter">
            </div>
        </div>
    </form>
    <div class="row">
    @foreach ($getImage as $item)
    <div class="col">
        <img src="{{asset($item->imagepath)}}" alt="" class="m-2">
        <a href="{{route('remove.productImage',$item->id)}}" class="btn btn-danger">
            <i class="fa-solid fa-trash"></i>
            Delete Photo
        </a>
        </div>
    @endforeach
    </div>
</div>
@endsection
