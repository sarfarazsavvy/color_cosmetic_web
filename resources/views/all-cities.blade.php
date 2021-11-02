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
                    <th>Action</th>
                </thead>

                <tbody>
                    @foreach($city as $c )
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->name}}</td>
                        <td>{{ $c->state}}</td>
                        <td>
                            <a href="{{route('city.edit',$c->id)}}"><i class="fa fa-edit"></i></a>
                            <form method="POST" action="{{route('city.destroy',[$c->id])}}">
                                @csrf
                                @method('delete')
                                <button class="fa fa-trash" data-id={{$c->id}} style="" data-toggle="tooltip" data-placement="bottom" title="Delete"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
 
                </tbody>
            </table>
        </div>
</div>

@endsection