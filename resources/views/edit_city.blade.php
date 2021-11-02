@extends('layouts.app')

@section('main')

    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-12">
                <h1>Edit Cities</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route('city.update',$city->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input placeholder="Karach, islamabad" required type="text" name="name" value="{{$city->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">State</label>
                        <select name="state" class="form-control">
                            <option value="{{$city->id}}">{{$city->state}}</option>
                            <option value="sindh">Sindh</option>
                            <option value="punjab">Punjab</option>
                            <option value="balochistan">Balochistan</option>
                            <option value="kpk">KPK</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button required type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection