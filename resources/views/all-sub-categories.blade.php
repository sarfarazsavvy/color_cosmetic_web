@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="primary-text font-weight-bold my-5">All Sub Categories</h1>
        </div>
    </div>
    <div class="col-12">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                            <form method="POST" action="{{route('sub_category.destroy',[$subCategory->id])}}">
                                @csrf
                                @method('delete')
                                <a href="{{route('sub_category.edit',$subCategory->id)}}"><i class="fa fa-edit"></i></a>
                                <button class="btn" data-id="{{$subCategory->id}}" style="" data-toggle="tooltip" data-placement="bottom" title="Delete"> <i class="fa fa-trash primary-text"></i> </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

@endsection