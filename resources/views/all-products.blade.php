@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1>All Products</h1>
        </div>
        <div class="row py-5">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">SKU</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Sub Category</th>
                            <th scope="col">Action</th>
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
                                <a href="{{route('edit',$product->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                <a href="{{route('remove.product',$product->id)}}"><i style="color: red;" class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection