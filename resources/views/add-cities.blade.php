@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1>Add Cities</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/add-city" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input placeholder="Karach, islamabad" required type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">State</label>
                    <select name="category_id" class="form-control">
                        <option value="sindh">Sindh</option>
                        <option value="sindh">Punjab</option>
                        <option value="sindh">Balochistan</option>
                        <option value="sindh">KPK</option>
                    </select>
                </div>
                <div class="form-group text-center">
                    <button required type="submit" name="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection