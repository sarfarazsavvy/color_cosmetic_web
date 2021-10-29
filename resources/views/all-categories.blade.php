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
                </thead>
                <tbody>
                    @foreach( $categories as $category )
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name}}</td>
                        <td>
                            <form method="post" action="delete-category">
                                @csrf
                                <input type="hidden" name="id" value="{{$category->id}}" class="form-control">
                                <button type="submit" class="btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

@endsection