@extends('layouts.app')

@section('main')

<div class="theme-container">
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-12">
                <h1>All beauty Advisors</h1>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead class="table-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach( $baGirls as $baGirl )
                        <tr>
                            <td>{{ $baGirl->id }}</td>
                            <td>{{ $baGirl->name }}</td>
                            <td>{{ $baGirl->email }}</td>
                            <td>{{ ($baGirl->active == "1") ? "Active" : "Unactive"}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection