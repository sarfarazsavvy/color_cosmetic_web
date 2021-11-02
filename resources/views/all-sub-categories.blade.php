@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1>All Categories</h1>
        </div>
    </div>
    <div class="col-12">
    
            <table class="table">
                <thead class="table-dark">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Parent Category</th>
                </thead>
               
                <tbody>
                    @foreach( $subCategories as $subCategory )
                    <tr>
                        <td>{{ $subCategory->id }}</td>
                        <td>{{ $subCategory->name}}</td>
                        <td>{{isset($subCategory->category) ? $subCategory->category->name : '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

@endsection