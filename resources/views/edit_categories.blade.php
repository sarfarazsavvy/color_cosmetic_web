@extends('layouts.app')

@section('main')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="font-weight-bold primary-text my-5">Edit Category</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route('category.update',$category->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-4">
                        <label class="mb-1 font-weight-bold " for="name">Name</label>
                        <input placeholder="Lorem Mart" required type="text" name="name" value="{{$category->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn bg-red text-white">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection