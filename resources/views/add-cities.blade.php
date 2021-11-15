@extends('layouts.app')

@section('main')

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="font-weight-bold my-5 primary-text">Add Cities</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('city.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold mb-1" for="name">Name</label>
                    <input placeholder="Karach, islamabad" required type="text" name="name" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label class="font-weight-bold mb-1" for="">State</label>
                    <select name="state" class="form-control">
                        <option value="sindh">Sindh</option>
                        <option value="punjab">Punjab</option>
                        <option value="balochistan">Balochistan</option>
                        <option value="kpk">KPK</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <button required type="submit" name="submit" class="btn bg-red text-white">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection