
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">

<!-- jQuery لازم الأول -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- بعده DataTables -->
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

@extends('layouts.master')
@section('content')
<div class="container">
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quentity</th>
            <th>Image</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)

        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->quantity}}</td>
            <td>
                <img src="{{asset($item->imagepath)}}" width="100px"  alt="">
            </td>
            <td>
                <a href="/addProductImage/{{$item->id}}" class="btn btn-secondary">
                    <i class="fa-solid fa-image"></i>
                    Add Images</a>
                <a href="{{route('product.remove',$item->id)}}" class="btn btn-danger" style="">
                    <i class="fas fa-trash"></i>
                    Remove</a>
                <a href="{{route('product.edit' , $item->id)}}}" class="btn btn-primary" style="">
                    <i class="fas fa-edit"></i>
                Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection

<script>
$(document).ready( function () {

let table = new DataTable('#myTable');

} );</script>

