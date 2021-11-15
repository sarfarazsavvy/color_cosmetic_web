@extends('layouts.app')

@section('main')

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route('update.product',$product->id)}}">
                    @csrf
                    {{--@method('PATCH')--}}
                    <div class="form-group mt-4">
                        <h2 class="font-weight-bold primary-text mt-5 mb-5">Edit Products</h2>
                    </div>
                    <div class="form-group mt-4">
                        <label for="quantity">SKU</label>
                        <input class="form-control" required type="text" name="sku" value="{{$product->sku_code}}">
                    </div>
                    <div class="form-group mt-4">
                        <label for="product-name">Product Name</label>
                        <input class="form-control" required type="text" name="name" value="{{$product->name}}">
                    </div>
                    <div class="form-group mt-4">
                        <label for="quantity">Price</label>
                        <input class="form-control" required type="number" name="price" value="{{$product->price}}">
                    </div>
                    <div class="form-group mt-4">
                        <label for="category">Category</label>
                        <select name="category_id" id="input-category" class="form-select form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                            @foreach ($categories as $category)
                                @if($category['id'] == old('document') or $category['id'] == $product->category_id)
                                    <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                                @else
                                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group mt-4">
                        <label for="quantity">Sub Category</label>
                        <select class="form-control" name="sub_category_id" id="">
                        @foreach ($sub_categories as $sub_category)
                            @if($sub_category['id'] == old('document') or $sub_category['id'] == $product->sub_category_id)
                                <option value="{{$sub_category['id']}}" selected>{{$sub_category['name']}}</option>
                            @else
                                <option value="{{$sub_category['id']}}">{{$sub_category['name']}}</option>
                                @endif
                                @endforeach
                                </select>
                    </div>
                    <div class="form-group mt-5">
                        <button class="btn bg-red text-white" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection