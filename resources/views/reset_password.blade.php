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
                            <a href="{{route('password.update',$c->email)}}"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection