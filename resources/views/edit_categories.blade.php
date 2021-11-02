@extends('layouts.app')

@section('main')
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-12">
                <h1>Edit Category</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route('category.update',$category->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input placeholder="Lorem Mart" required type="text" name="name" value="{{$category->name}}" class="form-control">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection