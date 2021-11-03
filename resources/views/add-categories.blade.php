@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="primary-text my-5 font-weight-bold">Add Category</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('category.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold mb-1" for="name">Name</label>
                    <input placeholder="Lorem Mart" required type="text" name="name" class="form-control">
                </div>
                <div class="form-group text-center mt-5">
                    <button required type="submit" name="submit" class="btn bg-red text-white">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection