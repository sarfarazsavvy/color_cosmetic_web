@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="primary-text font-weight-bold my-5">All Categories</h1>
        </div>
    </div>
    <div class="col-12">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                            <form method="POST" action="{{route('category.destroy',[$category->id])}}">
                                @csrf
                                @method('delete')
                                <a href="{{route('category.edit',$category->id)}}"><i class="fa fa-edit"></i></a>
                                <button class="btn" data-id="{{$category->id}}" style="" data-toggle="tooltip" data-placement="bottom" title="Delete"> <i class="fa fa-trash primary-text"></i> </button>
                            </form>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

@endsection