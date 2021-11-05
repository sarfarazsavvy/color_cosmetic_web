@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12 my-5">
            <h1 class="font-weight-bold primary-text">{{$store->name}}</h1>
            <h4><strong>Location:</strong> {{$store->address}}</h4>
            <span data-bs-toggle="modal" data-bs-target="#editStoreModal"
                class="primary-text font-weight-bold">(Edit)</span>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-between mb-3">
            <h2 class="primary-text font-weight-bold">Stores Current Stock</h2>
            <button type="button" class="btn bg-red text-white" data-bs-toggle="modal"
                data-bs-target="#addStockToStore">
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
                        <th scope="col">Category</th>
                        <th scope="col">Sub-Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($storeStocks == null)
                    <h1 class="text-danger">No Stock Found</h1>
                    @else
                    <?php $i =0; ?>
                    @foreach( $storeStocks as $storeStock )
                    <?php $i++ ?>
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{isset($storeStock->product) ?  $storeStock->product->name : '-'}}</td>
                        <td>{{isset($storeStock->store) ?  $storeStock->store->name : '-'}}</td>
                        <td>{{isset($storeStock->product->category->name) ?  $storeStock->product->category->name : '-'}}</td>
                        <td>{{isset($storeStock->product->sub_category->name) ?  $storeStock->product->sub_category->name : '-'}}</td>
                        <td>{{$storeStock->price}}</td>
                        <td>{{$storeStock->discount}}</td>
                        <td>{{$storeStock->quantity}}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <a type="button" data-bs-toggle="modal"
                                data-bs-target="#editStoreStock{{$storeStock['id']}}">
                                Edit
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="editStoreStock{{$storeStock['id']}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                {{isset($storeStock->product) ? $storeStock->product->name: '-'}}</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/update-store-stock" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$storeStock['id']}}" name="id">
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input name="price" placeholder="e.g Rs. 1000" required
                                                        type="number" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Discount</label>
                                                    <input name="discount" value="0" required type="number"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group text-center mt-5">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
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
                            <div class="form-group text-center mt-5">
                                <button required type="submit" name="submit" class="btn btn-primary">Assign</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editStoreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <form class="p-3" action="/update-store" method="post" id="add_product_form">
                    @csrf
                    <input type="hidden" name="id" value="{{$store->id}}">
                    <!-- {{ csrf_field() }} -->
                    <div class="form- mb-3">
                        <h2 class="primary-text font-weight-bold">Details of new store</h2>
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-1" for="name">Store Name</label>
                        <input placeholder="Lorem Mart" required  value="{{$store->name}}" type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-1" for="address" class="">Address</label>
                        <input placeholder="Street, City, landmark" value="{{$store->address}}"  required name="address" type="text"
                            class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-1" for="city">City</label>
                        <select name="city" class="form-control">
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-1" for="contact">Store Contact</label>
                        <input placeholder="123455667" required  value="{{$store->contact}}" type="number" name="contact" class="form-control">
                    </div>
                    <div class="form-group mb-3 text-center">
                        <button required type="submit" name="submit" class="btn bg-red text-white">Update Store</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
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