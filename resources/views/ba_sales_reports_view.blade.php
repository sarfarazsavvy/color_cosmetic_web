@extends('layouts.app')

@section('main')

    <div class="theme-container">
                    <h1  class="m-0  font-weight-bold float-center">BA Sales Reports Summary</h1>
             </div>

    <div class="container">
        <div class="row">
                <div class="card my-5 p-5" style="">
                    <h1>BA Sales Reports Summary</h1>
                    <div>
                        <div class="card-body">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputTitle" class="col-form-label">Name:</label>
                                        <span style="color: red;"> :{{isset($user->name) ? $user->name :'-'}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTitle" class="col-form-label">Email:</label>
                                        <span style="color: red;">{{isset($user->email) ? $user->email : '-'}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTitle" class="col-form-label">Date:</label>
                                        <span style="color: red;">{{now()}}</span>
                                    </div>
                                </div>

                                    <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                                        <h5>Daily Sales Reports Summary</h5>
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Product</th>
                                            <th>Category</th>
                                            <th>Actual Price</th>
                                            <th>Qty</th>
                                            <th>Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=0; ?>
                                        @foreach($daily as $d)
                                            <?php $i++ ?>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$d->sale_date}}</td>
                                                <td>{{isset($d->product) ? $d->product[0]['name'] : '-'}}</td>
                                                <td>{{isset($d->product) ? $d->product[0]['category']['name'] : '-'}}</td>
                                                <td>{{isset($d->store_stock) ? $d->store_stock[0]['price'] : '-'}}</td>
                                                <td>{{$d->quantity}}</td>
                                                <td>{{$d->price}}</td>
                                            </tr>
                                        @endforeach
                                        <tr style="font-weight: bold;color:black">
                                            <td colspan="5" style="">Total</td>
                                            <td>{{$daily->sum('quantity')}}</td>
                                            <td>{{$daily->sum('price')}}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                            <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                                <h5>Weekly Sales Reports</h5>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Actual Price</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=0; ?>
                                @foreach($weekly as $w)
                                    <?php $i++ ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$w->sale_date}}</td>
                                        <td>{{isset($w->product[0]['name']) ? $w->product[0]['name'] : '-'}}</td>
                                        <td>{{isset($w->product[0]['category']) ? $w->product[0]['category']['name'] : '-'}}</td>
                                        <td>{{isset($w->store_stock) ? $w->store_stock[0]['price'] : '-'}}</td>
                                        <td>{{$w->quantity}}</td>
                                        <td>{{$w->price}}</td>
                                    </tr>
                                @endforeach
                                <tr style="font-weight: bold;color:black">
                                    <td colspan="5">Total</td>
                                    <td>{{$weekly->sum('quantity')}}</td>
                                    <td>{{$weekly->sum('price')}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                                <h5>Monthly Sales Reports</h5>
                                <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Actual Price</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=0; ?>
                                @foreach($monthly as $m)
                                    <?php $i++ ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$m->sale_date}}</td>
                                        <td>{{isset($m->product[0]['name']) ? $m->product[0]['name'] : '-'}}</td>
                                        <td>{{isset($m->product[0]['category']) ? $m->product[0]['category']['name'] : '-'}}</td>
                                        <td>{{isset($m->store_stock) ? $m->store_stock[0]['price'] : '-'}}</td>
                                        <td>{{$m->quantity}}</td>
                                        <td>{{$m->price}}</td>
                                    </tr>

                                @endforeach
                                <tr style="font-weight: bold;color:black">
                                    <td colspan="5">Total</td>
                                    <td>{{$monthly->sum('quantity')}}</td>
                                    <td>{{$monthly->sum('price')}}</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                    </div>
                </div>
            </div>
    </div>
@endsection




