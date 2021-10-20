@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1>Assign Store to Beauty Advisor</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/assign-store-to-beauty-advisor" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Beauty Advisor</label>
                    <select name="user_id" class="form-control">
                        @foreach( $baGirls as $baGirl) 
                            <option value="{{$baGirl->id}}">{{$baGirl->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Store</label>
                    <select name="store_id" class="form-control">
                        @foreach( $stores as $store) 
                            <option value="{{$store->id}}">{{$store->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group text-center">
                    <button required type="submit" name="submit" class="btn btn-primary">Assign</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection