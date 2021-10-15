@extends('layouts.main')


@section('body')

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Store Managment</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#newStoreModal">
                Add Store
            </button>
        </div>
    </div>
    <div class="row py-5">
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact</th>
                        <th scope="col">City</th>
                        <th scope="">Province</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stores as $store)
                    <tr>
                        <th scope="row">{{$store->id}}</th>
                        <td>{{$store->name}}</td>
                        <td>{{$store->address}}</td>
                        <td>{{$store->contact}}</td>
                        <td>{{$store->city->name}}</td>
                        <td>{{$store->city->state}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="newStoreModal" tabindex="-1" aria-labelledby="newStoreModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="/add-store" method="post">
                    @csrf
                    <div class="form-group">
                        <h3>Details of new store</h3>
                    </div>
                    <div class="form-group">
                        <label for="name">Store Name</label>
                        <input placeholder="Lorem Mart" required type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address" class="">Address</label>
                        <input placeholder="Street, City, landmark" required name="address" type="text"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <select name="city" class="form-control">
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contact">Store Contact</label>
                        <input placeholder="123455667" required type="number" name="contact" class="form-control">
                    </div>
                    <div class="form-group text-center">
                        <button required type="submit" name="submit" class="btn btn-dark">Add Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection