@extends('layouts.app')

@section('main')

<div class="theme-container">
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 font-weight-bold primary-text">All beauty Advisors</h1>
            </div>
            <div class="col-12">
                <table id="allBaGirls" class="table">
                    <thead class="table-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <!-- <th>Action</th> -->
                    </thead>
                    <tbody>
                        @foreach( $baGirls as $baGirl )
                        <tr>
                            <td>{{ $baGirl->id }}</td>
                            <td>{{ $baGirl->name }}</td>
                            <td>{{ $baGirl->email }}</td>
                            <td class='{{ ($baGirl->active == "1") ? "text-success" : "text-danger"}}'>{{ ($baGirl->active == "1") ? "Active" : "Unactive"}}</td>
                            <!-- <td> -->
                                <!-- trigger -->
                                <!-- <a class="btn" data-bs-toggle="modal" data-bs-target="#baStatusModal{{$baGirl->id}}">Edit</a> -->
                                <!-- Modal -->
                                <!-- <div class="modal fade" id="baStatusModal{{$baGirl->id}}" tabindex="-1"
                                    aria-labelledby="baStatusModal{{$baGirl->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body p-5">
                                                <h3>{{$baGirl->name}}</h3>
                                                <h5 class='{{ ($baGirl->active == "1") ? "text-success" : "text-danger"}}'>{{ ($baGirl->active == "1") ? "Active" : "Unactive"}}</h5>
                                                <p class="mt-5">Are you sure you want to deactivate this Beauty Advisor?</p>
                                                <form method="post" action="/deactivate-ba">
                                                @csrf
                                                    <input type="hidden" name="id" value="{{ $baGirl->id }}">
                                                    <button type="submit" class="btn btn-danger">Yes!</button>
                                                </form>
                                            </div>  
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            <!-- </td> -->
                        
                        </tr>
                        @endforeach
                    
                        
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection




