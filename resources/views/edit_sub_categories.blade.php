@extends('layouts.app')

@section('main')

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 primary-text text-capitalize font-weight-bold">Edit Sub Category</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route('sub_category.update',$subcategory->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-4">
                        <label class="mb-1 font-weight-bold" for="name">Name</label>
                        <input placeholder="Lorem Mart" required type="text" name="name" value="{{$subcategory->name}}" class="form-control">
                    </div>
                    <div class="form-group mt-4">
                        <label class="font-weight-bold mb-1" for="">Parent Category</label>

                        <select name="category_id" id="input-category" class="form-select form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                            @foreach ($categories as $category)
                                @if($category['id'] == old('document') or $category['id'] == $subcategory->category_id)
                                    <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                                @else
                                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" name="submit" class="btn bg-red text-white">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection