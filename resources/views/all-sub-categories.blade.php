@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1>All Sub Categories</h1>
        </div>
    </div>
    <div class="col-12">
    
            <table class="table">
                <thead class="table-dark">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Parent Category</th>
                    <th>Action</th>
                </thead>
               
                <tbody>
                    @foreach( $subCategories as $subCategory )
                    <tr>
                        <td>{{ $subCategory->id }}</td>
                        <td>{{ $subCategory->name}}</td>
                        <td>{{isset($subCategory->category) ? $subCategory->category->name : '-' }}</td>
                        <td>
                            <a href="{{route('sub_category.edit',$subCategory->id)}}"><i class="fa fa-edit"></i></a>
                            <form method="POST" action="{{route('sub_category.destroy',[$subCategory->id])}}">
                                @csrf
                                @method('delete')
                                <button class="fa fa-trash" data-id={{$subCategory->id}} style="" data-toggle="tooltip" data-placement="bottom" title="Delete"></button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

@endsection