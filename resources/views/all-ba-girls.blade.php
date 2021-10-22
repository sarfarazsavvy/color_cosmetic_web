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
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach( $baGirls as $baGirl )
                        <tr>
                            <td>{{ $baGirl->id }}</td>
                            <td>{{ $baGirl->name }}</td>
                            <td>{{ $baGirl->email }}</td>
                            <td>{{ ($baGirl->active == "1") ? "Active" : "Unactive"}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#baStatusModal{{$baGirl->id}}">
                                    Launch demo modal
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="baStatusModal{{$baGirl->id}}" tabindex="-1"
                                    aria-labelledby="baStatusModal{{$baGirl->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h3>{{$baGirl->name}}</h3>
                                                <h5>{{ ($baGirl->active == "1") ? "Active" : "Unactive"}}</h5>
                                            </div>  
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><a class="btn">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

