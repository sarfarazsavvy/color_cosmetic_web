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
                    @foreach($allCities as $city )
                    <tr>
                        <td>{{ $city->id }}</td>
                        <td>{{ $city->name}}</td>
                        <td>{{ $city->state}}</td>
                    </tr>
                    @endforeach
 
                </tbody>
            </table>
        </div>
</div>

@endsection