@extends('layouts.app')

@section('main')

<div class="theme-container">
</div>

<div class="container">
    <div class="row my-5">
        <div class="col-12">
            <h1 class="my-5 font-weight-bold text-capitalize float-center primary-text">BA Sales Reports Summary</h1>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-capital">{{isset($user->name) ? $user->name :'-'}}</h3>
                <p><strong class="font-weight-bold primary-text">Email:
                    </strong>{{isset($user->email) ? $user->email : '-'}}</p>
                <p>
                    <strong class="font-weight-bold primary-text">Current Date: </strong>{{now()->format('d-m-Y')}}
                </p>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12">
            <div class="nav d-flex flex-row-reverse nav-tabs" id="myTab" role="tablist" style="border-bottom: none">
                <button class="btn bg-red text-white mx-2" id="home-tab" data-bs-toggle="tab" data-bs-target="#dailyReport" type="button" role="tab" aria-controls="home" aria-selected="true">Daily</button>
                <button class="btn bg-red text-white mx-2" id="profile-tab" data-bs-toggle="tab" data-bs-target="#weeklyReport" type="button" role="tab" aria-controls="profile" aria-selected="false">Weekly</button>
                <button class="btn bg-red text-white mx-2" id="contact-tab" data-bs-toggle="tab" data-bs-target="#monthlyReport" type="button" role="tab" aria-controls="contact" aria-selected="false">Monthly</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- ========== TABS ======== -->
            <div class="tab-content" id="myTabContent">
                <!-- Daily Report -->
                <div class="tab-pane fade show active" id="dailyReport" role="tabpanel" aria-labelledby="home-tab">

                    <table class="table table-bordered" id="baSalesReportDaily" width="100%" cellspacing="0">
                        <h5 class="font-weight-bold primary-text mb-3 text-uppercase">Daily Sales Reports Summary</h5>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Category</th>
                                {{-- <th>Actual Price</th> --}}
                                <th>Unit</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach($daily as $d)
                            <?php $i++ ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ \Carbon\Carbon::parse($d->sale_date)->format('d-m-Y')}}</td>
                                <td>{{isset($d->product) ? $d->product[0]['name'] : '-'}}</td>
                                <td>{{isset($d->product) ? $d->product[0]['category']['name'] : '-'}}</td>
                                {{-- <td>{{isset($d->store_stock) ? $d->store_stock[0]['price'] : '-'}}</td> --}}
                                <td>{{$d->quantity}}</td>
                                <td>{{$d->price}}</td>
                            </tr>
                            @endforeach
                            <tr style="font-weight: bold;color:black">
                                <td class="primary-text">Total Amount</td>
                                <td class="border-none"></td>
                                <td class="border-none"></td>
                                <td class="border-none"></td>
                                <td colspan="1" >{{$daily->sum('quantity')}}</td>
                                <td colspan="2">{{$daily->sum('price')}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Weekly Report -->
                <div class="tab-pane fade" id="weeklyReport" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-bordered" id="baSalesReportWeekly" width="100%" cellspacing="0">
                        <h5 class="font-weight-bold primary-text mb-3 text-uppercase">Weekly Sales Reports</h5>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Category</th>
                                {{-- <th>Actual Price</th> --}}
                                <th>Unit</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach($weekly as $w)
                            <?php $i++ ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ \Carbon\Carbon::parse($w->sale_date)->format('d-m-Y')}}</td>
                                <td>{{isset($w->product[0]['name']) ? $w->product[0]['name'] : '-'}}</td>
                                <td>{{isset($w->product[0]['category']) ? $w->product[0]['category']['name'] : '-'}}
                                </td>
                                {{-- <td>{{isset($w->store_stock) ? $w->store_stock[0]['price'] : '-'}}</td> --}}
                                <td>{{$w->quantity}}</td>
                                <td>{{$w->price}}</td>
                            </tr>
                            @endforeach
                            <tr style="font-weight: bold;color:black">
                                <td class="primary-text">Total Amount</td>
                                <td class="border-none"></td>
                                <td class="border-none"></td>
                                <td class="border-none"></td>
                                <td colspan="1">{{$weekly->sum('quantity')}}</td>
                                <td c0lspan="2">{{$weekly->sum('price')}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Monthly -->
                <div class="tab-pane fade" id="monthlyReport" role="tabpanel" aria-labelledby="contact-tab">
                    <!-- Montly  -->
                    <table class="table table-bordered" id="baSalesReportMonthly" width="100%" cellspacing="0">
                        <h5 class="font-weight-bold primary-text mb-3 text-uppercase">Monthly Sales Reports</h5>
                        <thead>
                            <tr>

                                <th>ID</th>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Category</th>
                                {{-- <th>Actual Price</th> --}}
                                <th>Unit</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach($monthly as $m)
                            <?php $i++ ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ \Carbon\Carbon::parse($m->sale_date)->format('d-m-Y') }}
                                </td>
                                <td>{{isset($m->product[0]['name']) ? $m->product[0]['name'] : '-'}}</td>
                                <td>{{isset($m->product[0]['category']) ? $m->product[0]['category']['name'] : '-'}}
                                </td>
                                {{-- <td>{{isset($m->store_stock) ? $m->store_stock[0]['price'] : '-'}}</td> --}}
                                <td>{{$m->quantity}}</td>
                                <td>{{$m->price}}</td>
                            </tr>
                            @endforeach
                            <tr style="font-weight: bold;color:black">
                                <td class="primary-text">Total Amount</td>
                                <td class="border-none"></td>
                                <td class="border-none"></td>
                                <td class="border-none"></td>
                                <td colspan="1">{{$weekly->sum('quantity')}}</td>
                                <td c0lspan="2">{{$weekly->sum('price')}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection