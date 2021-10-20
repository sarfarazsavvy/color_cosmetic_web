@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <form action="/add-products" method="post" id="add_product_form">
                @csrf
                <!-- {{ csrf_field() }} -->
                <div class="form-group">
                    <h2 class="font-weight-bold">Add your product details</h2>
                </div>
                <div class="form-group">
                    <label for="quantity">SKU</label>
                    <input class="form-control" required type="text" name="sku">
                </div>
                <div class="form-group">
                    <label for="product-name">Product Name</label>
                    <input class="form-control" required type="text" name="name">
                </div>
                <div class="form-group">
                    <label for="quantity">Price</label>
                    <input class="form-control" required type="number" name="price">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category_id" id="" onChange="load_sc()">
                        @foreach($cats as $cat)
                        <option class="text-uppercase" value="{{$cat->id}}" data-name="{{$cat->name}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Sub Category</label>
                    <select class="form-control" name="sub_category_id" id="">
                        @foreach($subCats as $subCat)
                        <option class="text-uppercase" value="{{$subCat->id}}">{{$subCat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-dark">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection