@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1>Stores Managment</h1>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <!-- Button trigger modal -->
            <button type="button" class="btn bg-red text-white" data-bs-toggle="modal"
                data-bs-target="#addMoreProducts">
                Add New Store
            </button>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-12">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact</th>
                            <th scope="col">City</th>
                            <th scope="">Province</th>
                            <th scope="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stores as $store)
                        <tr>
                            <th scope="row">{{$store->id}}</th>
                            <td>{{$store->name}}</td>
                            <td>{{$store->address}}</td>
                            <td>{{$store->contact}}</td>
                            <td>{{isset($store->city) ? $store->city->name : '-'}}</td>
                            <td>{{isset($store->city) ? $store->city->state : '-'}}</td>
                            <td><a class="primary-text font-weight-bold" href="{{route('store-stock',$store->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addMoreProducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <form action="/add-store" method="post">
                    @csrf
                    <div class="form-group my-5">
                        <h2 class="font-weight-bold primary-text">Details of new store</h2 class="font-weight-bold primary-text">
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-1 font-weight-bold" for="name">Store Name</label>
                        <input placeholder="Lorem Mart" required type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-1 font-weight-bold" for="address" class="">Address</label>
                        <input placeholder="Street, City, landmark" required name="address" type="text"
                            class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-1 font-weight-bold" for="city">City</label>
                        <select name="city" class="form-control">
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-1 font-weight-bold" for="contact">Store Contact</label>
                        <input placeholder="123455667" required type="number" name="contact" class="form-control">
                    </div>
                    <div class="form-group mb-3 text-center">
                        <button required type="submit" name="submit" class="btn btn-primary">Add Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection