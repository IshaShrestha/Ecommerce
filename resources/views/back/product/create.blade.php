@extends('back.layout.app')
@section('content')
    <form action="{{route('product.store'),}}" method="POST">
    @csrf
        <div class="form-row">
            <div class="form-group col-md-2">
            </div>
            <div class="form-group col-md-6">
            <label for="inputName">Product Name</label>
            <input type="text" name="name" class="form-control" id="inputName">
                @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
            </div>
            <div class="form-group col-md-6">
            <label for="inputDescription">Description</label>
            <input type="text" name="description" class="form-control" id="inputDescription">
                @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
            </div>
            <div class="form-group col-md-6">
                <label for="inputImage">Image</label>
                <div class="col-md-12">
                    <input id="inputImage" type="file" class="form-control" name="image">
                </div>
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-2">
        </div>
        <div class="form-group col-md-3">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control">
                <option selected value="">Select</option>
                @foreach($categories as $category)
                    <option {{ old('category') === $category->slug?'selected':'' }} value="{{ $category->slug }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
            <div class="form-group col-md-3">
                <label for="inputBrand">Brand</label>
                <select name="brand" id="inputBrand" class="form-control">
                    <option selected value="">Select</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->slug }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                </div>
            <div class="form-group col-md-3">
                <label for="inputQuantity">Quantity</label>
                <input type="text" name="quantity" class="form-control" id="inputQuantity">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPrice">Price</label>
                <input type="text" class="form-control" id="inputPrice" name="price">
            </div>
        </div>



        <div class="form-row">
            <div class="form-group col-md-2">
            </div>
            <div class="form-group col-md-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">In stock</label>
                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Display Status</label>
                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Featured</label>
                </div>
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-2">
            </div>

            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>
@endsection
