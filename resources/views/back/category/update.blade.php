@extends('back.layout.app')
@section('content')

    @if(session()->has('success'))
        {{ session()->get('success') }}
    @endif

    <form action="{{route('category.update', $category->slug)}}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-2">
            </div>

            <div class="form-group col-md-6">
                <label for="inputName">Category Name</label>
                <input type="text" name="name" value="{{old('name',$category->name)}}" class="form-control" id="inputCity">
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
            </div>
            <div class="form-group col-md-6">
                <label for="inputDescription">Category Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{old('description',$category->description)}}</textarea>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
            </div>
            <div class="form-group col-md-6">
                <label for="inputDescription">Parent Category</label>
                <select name="parent" id="parent" class="form-control">
                    <option selected value="">Select</option>
                    @foreach($categories as $cat)

                        <option {{ ($category->category_id === $cat->id)?'selected':'' }} value="{{ $cat->slug }}">{{ $cat->name }}</option>

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
                    <input id="profile_image" type="file"  class="form-control" name="image">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
            </div>

            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>


@endsection
