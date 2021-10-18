@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1>Create Stores</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
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
                    <button required type="submit" name="submit" class="btn btn-primary">Add Store</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection