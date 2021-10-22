@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1>All Stores</h1>
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
                            <td>{{$store->city->name}}</td>
                            <td>{{$store->city->state}}</td>
                            <td><a href="{{route('store-stock',$store->id)}}">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection