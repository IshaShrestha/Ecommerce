@extends('back.layout.app')
@section('content')
    <form action="{{ route('category.store') }}" method="POST">
    @csrf
        <div class="form-row">
            <div class="form-group col-md-2">
            </div>

            <div class="form-group col-md-6">
                <label for="inputName">Category Name</label>
                <input type="text" name="name" class="form-control" id="inputCity">
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
                <label for="inputDescription">Category Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                <label for="inputDescription">Parent Category</label>
                <select name="parent" id="parent" class="form-control">
                    <option selected value="">Select</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
            </div>
            <div class="form-group col-md-6">
                <label for="inputImage">Image</label>
                <div class="col-md-12">
                    <input id="profile_image" type="file" class="form-control" name="image">
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
