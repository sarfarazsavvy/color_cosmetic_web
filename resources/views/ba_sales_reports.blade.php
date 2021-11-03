@extends('layouts.app')

@section('main')

    <div class="theme-container">
        <div class="container py-5 my-5">
            <div class="row">
                <div class="col-12">
                    <h1>BA Sales Reports Summary</h1>
                </div>
                <div class="col-12">
                    <table id="allBaGirls" class="table">
                        <thead class="table-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Select</th>
                        </thead>
                        <tbody>
                        <?php $i=0; ?>
                        @foreach( $ba_user as $ba_rep )
                            <?php $i++; ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ $ba_rep->name }}</td>
                                <td>{{ $ba_rep->email }}</td>
                                <td>
                                    <a href="{{route('ba.sales.view',$ba_rep->id)}}" class="btn btn-link border rounded" data-toggle="tooltip" data-placement="bottom" title="Edit Sale">
                                        <i class="fa fa-edit"></i> View
                                    </a>
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




