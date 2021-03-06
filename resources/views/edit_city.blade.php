@extends('layouts.app')

@section('main')

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="primary-text text-capitalize font-weight-bold my-5">Edit Cities</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route('city.update',$city->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-4">
                        <label class="font-weight-bold mb-1" for="name">Name</label>
                        <input placeholder="Karach, islamabad" required type="text" name="name" value="{{$city->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold mb-1" for="">State</label>
                        <select name="state" class="form-control">
                            <option value="{{$city->id}}">{{$city->state}}</option>
                            <option value="sindh">Sindh</option>
                            <option value="punjab">Punjab</option>
                            <option value="balochistan">Balochistan</option>
                            <option value="kpk">KPK</option>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <button required type="submit" name="submit" class="btn bg-red text-white">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection