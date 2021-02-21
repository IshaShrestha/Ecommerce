@extends('back.layout.app')
@section('content')
    <div class="col">
        <div align="right">
            <a href="{{route('product.create')}}" class="btn btn-primary">Add</a>


        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th colspan="2" scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{substr($product->description,0,30)}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{route('product.edit',$product->slug)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                       <form action="{{route('product.delete', $product->slug)}}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button class="btn btn-danger" type="submit">Delete</button>
                       </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
