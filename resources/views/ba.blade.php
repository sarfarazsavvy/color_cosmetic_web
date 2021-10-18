@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1>Create Beauty Advisor</h1>
        </div>
        <div class="col-12">
            <form action="/create-beauty-advisors" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" required type="email" class="form-control">
                </div>
                <!-- <div class="form-group">
                    <label for="">Username</label>
                    <input name="n" required type="text" class="form-control">
                </div> -->
                <!-- <div class="form-group">
                    <label for="">Contact No</label>
                    <input name="contact" required type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">CNIC</label>
                    <input name="cnic" required type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Store</label>
                    <select name="store" class="form-control">
                        @foreach($stores as $store)
                            <option value="{{$store->id}}">{{$store->name}}</option>
                        @endforeach
                    </select>
                </div> -->
                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" required type="password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection