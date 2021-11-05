@extends('layouts.app')

@section('main')

    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 primary-text">Reset Password</h1>
            </div>
        </div>
        <div class="col-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="table-dark">
                <th>ID</th>
                <th>email</th>
                <th>Action</th>

                <tbody>
                <?php $i=0; ?>
                @foreach($password as $c )
                    <?php $i++; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $c->email}}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#baPasswordChangeModal{{$i}}">
                                Reset Password
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="baPasswordChangeModal{{$i}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$c->email}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('password.update', $c->email) }}">
                                            <input type="hidden" value="{{$c->email}}">
                                            <div class="form-group">
                                                <label for="">Enter New Password</label>
                                                <input type="text" name="password" class="form-control">
                                            </div>
                                            <div class="form-group text-center mt-3">
                                                <button class="btn bg-red primary-text text-white" type="submit">Change Password</button>
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

@endsection