@extends('layouts.app')

@section('main')

<div class="theme-container">
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 font-weight-bold primary-text">All beauty Advisors</h1>
            </div>
            <div class="col-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                            <td class='{{ ($baGirl->active == "1") ? "text-success" : "text-danger"}}'>{{ ($baGirl->active == "1") ? "Active" : "Unactive"}}</td>
                            <td>
                                <a class="btn primary-text" data-bs-toggle="modal" data-bs-target="#baStatusModal{{$baGirl->id}}">Change Status</a>
            
                                <div class="modal fade text-center" id="baStatusModal{{$baGirl->id}}" tabindex="-1"
                                    aria-labelledby="baStatusModal{{$baGirl->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body p-5">
                                                <h3 class="text-capitalize">{{$baGirl->name}}</h3>
                                                <h5 class='{{ ($baGirl->active == "1") ? "text-success" : "text-danger"}}'>{{ ($baGirl->active == "1") ? "Active" : "Unactive"}}</h5>
                                                
                                                <form method="post" action="/deactivate-ba">
                                                @csrf
                                                    <input type="hidden" name="id" value="{{ $baGirl->id }}">
                                                    <div class="btn-group mt-4" role="group" aria-label="Basic radio toggle button group">

                                                        <input type="radio" class="btn-check" value="1" name="status" id="ba{{ $baGirl->id }}btnradio2" autocomplete="off" {{($baGirl->active == "1") ? "checked" : ""}}>
                                                        <label class="btn btn-outline-primary" for="ba{{ $baGirl->id }}btnradio2">Active</label>

                                                        <input type="radio" class="btn-check" value="0" name="status" id="ba{{ $baGirl->id }}btnradio1" autocomplete="off"  {{($baGirl->active == "1") ? "" : "checked"}}>
                                                        <label class="btn btn-outline-primary" for="ba{{ $baGirl->id }}btnradio1">Inactive</label>

                                                    </div>
                                                    <div class="form-group text-center mt-4">
                                                        <button type="submit" class="btn bg-red text-white">Confirm</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>    
                                                </form>
                                            </div> 
                                        </div>
                                    </div>
                                </div> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection




