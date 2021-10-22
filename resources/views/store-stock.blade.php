@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1>Add Product To Store</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStockToStore">
                Add More Stock
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Store</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($storeStocks == null)
                    <h1 class="text-danger">No Stock Found</h1>
                    @else
                    @foreach( $storeStocks as $storeStock )
                    <tr>
                        <th scope="row">{{$storeStock['id']}}</th>
                        <td>{{$storeStock['product']['name']}}</td>
                        <td>{{$storeStock['store']['name']}}</td>
                        <td>{{$storeStock['price']}}</td>
                        <td>{{$storeStock['quantity']}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="addStockToStore" tabindex="-1" aria-labelledby="addStockToStoreLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStockToStoreLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form action="/add-products-to-store" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Select Products</label>
                                <select required name="product_id" class="form-control ba-girl-select">
                                    @foreach( $products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="store_id" value="{{$id}}">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input required type="number" name="quantity" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Price</label>
                                <input required type="number" name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Discount</label>
                                <input type="number" name="discount" class="form-control">
                            </div>
                            <div class="form-group text-center">
                                <button required type="submit" name="submit" class="btn btn-primary">Assign</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-scripts')
<script>
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.ba-girl-select').select2();
    $('.ba-girl-store-select').select2();
});
</script>
@endsection