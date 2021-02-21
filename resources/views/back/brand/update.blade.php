@extends('back.layout.app')
@section('content')

    @if(session()->has('success'))
        {{ session()->get('success') }}
    @endif
    <form action="{{route('brand.update', $brand->slug)}}" method="POST">
        <div class="form-row">
            <div class="form-group col-md-2">
            </div>
            @csrf
            <div class="form-group col-md-6">
                <label for="inputCity">Brand Name</label>
                <input type="text" name="name" value="{{ old('name','Nike') }}" class="form-control" id="inputCity">
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
                <label for="inputState">Brand Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
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
