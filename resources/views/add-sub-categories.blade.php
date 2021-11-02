@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="font-weight-bold primary-text my-5">Add Sub Category</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('sub_category.store')}}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label class="font-weight-bold mb-1" for="name">Name</label>
                    <input placeholder="Lorem Mart" required type="text" name="name" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label class="mb-1 font-weight-bold" for="">Parent Category</label>
                    <select name="category_id" class="form-control">
                        @foreach( $categories as $category) 
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group text-center mt-5">
                    <button required type="submit" name="submit" class="btn bg-red text-white">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection