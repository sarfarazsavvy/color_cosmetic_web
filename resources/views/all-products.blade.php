@extends('layouts.app')
@section('main')
<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="font-weight-bold my-5 primary-text">All Products</h1>
        </div>
        <div class="row my-5">
            <div class="col-12">
                <!-- Button trigger modal -->
                <button type="button" class="btn bg-red text-white" data-bs-toggle="modal"
                    data-bs-target="#addMoreProducts">
                    Add More Products
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>SKU</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->sku_code}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{isset($product->category) ? $product->category->name : '-'}}</td>
                            <td>{{isset($product->sub_category) ? $product->sub_category->name : '-'}}</td>
                            <td>
                                <a href="{{route('edit',$product->id)}}"><i
                                        class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                <a href="{{route('remove.product',$product->id)}}"><i style="color: red;"
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modals -->

<!-- Modal -->
<div class="modal fade" id="addMoreProducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <form action="/add-products" method="post" id="add_product_form">
                    @csrf
                    <!-- {{ csrf_field() }} -->
                    <div class="form-group my-5">
                        <h2 class="font-weight-bold text-underline primary-text">Add your product details</h2>
                    </div>
                    <div class="form-group mb-3">
                        <label for="quantity" class="font-weight-bold mb-1">SKU</label>
                        <input class="form-control" required type="text" name="sku">
                    </div>
                    <div class="form-group mb-3">
                        <label for="product-name" class="font-weight-bold mb-1">Product Name</label>
                        <input class="form-control" required type="text" name="name">
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-1" for="quantity">Price</label>
                        <input class="form-control" required type="number" name="price">
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-1" for="category">Category</label>
                        <select class="form-control" name="category_id" id="" onChange="load_sc()">
                            @foreach($cats as $cat)
                            <option class="text-uppercase" value="{{$cat->id}}" data-name="{{$cat->name}}">
                                {{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-1" for="quantity">Sub Category</label>
                        <select class="form-control" name="sub_category_id" id="">
                            @foreach($subCats as $subCat)
                            <option class="text-uppercase" value="{{$subCat->id}}">{{$subCat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-dark">Add</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
