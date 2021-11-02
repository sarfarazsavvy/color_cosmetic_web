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
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach( $categories as $category )
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name}}</td>
                        <td>
                            <a href="{{route('category.edit',$category->id)}}"><i class="fa fa-edit"></i></a>
                            <form method="POST" action="{{route('category.destroy',[$category->id])}}">
                                @csrf
                                @method('delete')
                                <button class="fa fa-trash" data-id={{$category->id}} style="" data-toggle="tooltip" data-placement="bottom" title="Delete"></button>
                            </form>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

@endsection