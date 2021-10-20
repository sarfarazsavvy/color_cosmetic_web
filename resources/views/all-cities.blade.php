@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1>All Cities</h1>
        </div>
    </div>
    <div class="col-12">
            <table class="table">
                <thead class="table-dark">
                    <th>ID</th>
                    <th>Name</th>
                    <th>State</th>
                </thead>
                <tbody>
                    @foreach( $cities as $city )
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name}}</td>
                        <td>{{ $category->state}}</td>
                    </tr>
                    @endforeach
 
                </tbody>
            </table>
        </div>
</div>

@endsection