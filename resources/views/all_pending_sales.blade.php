@extends('layouts.app')



@push('plugin-styles')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush

@section('main')


    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 font-weight-bold primary-text">All Pending Sales</h1>
            </div>
            <div class="row py-5">
                <div class="col-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Store Name</th>
                            <th scope="col">Products Name</th>
                            <th scope="col">Store Stock Qty</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Status</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach($pending_sales as $ps)
                            <?php $i++;?>
                            @if($ps->quantity > $ps->store_stock[0]['quantity'])
                                <tr style="border: 1px solid red; border-radius: 12px; color: red">
                                <th scope="row">{{$i}}</th>
                                <td>{{isset($ps->user) ? $ps->user->name : '-'}}</td>
                                <td>{{isset($ps->store) ? $ps->store[0]['name'] : '-'}}</td>
                                <td>{{isset($ps->product[0]) ? $ps->product[0]['name'] : '-'}}</td>
                                <td>{{isset($ps->store_stock[0]) ? $ps->store_stock[0]['quantity'] : '-'}}</td>
                                    <td>{{$ps->quantity}}</td>
                                    <td>{{$ps->created_at}}</td>
                                <td>
                                    <input data-product_id="{{$ps->product_id}}" data-qty="{{$ps->quantity}}"  class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Approved" data-off="Pending" {{ $ps->status ? 'checked' : '' }} />
                                </td>
                             </tr>
                             @else
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{isset($ps->user) ? $ps->user->name : '-'}}</td>
                                    <td>{{isset($ps->store) ? $ps->store[0]['name'] : '-'}}</td>
                                    <td>{{isset($ps->product[0]) ? $ps->product[0]['name'] : '-'}}</td>
                                    <td>{{isset($ps->store_stock[0]) ? $ps->store_stock[0]['quantity'] : '-'}}</td>
                                    <td>{{$ps->quantity}}</td>
                                    <td>{{$ps->sale_date}}</td>
                                    <td><input data-product_id="{{$ps->product_id}}" data-qty="{{$ps->quantity}}"  class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Approved" data-off="Pending" {{ $ps->status ? 'checked' : '' }} /></td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('plugin-scripts')
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>--}}
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush

@push('custom-scripts')
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var product_id = $(this).data('product_id');
                var qty = $(this).data('qty');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('sales.pending') }}',
                    data: {'status': status, 'product_id': product_id,'qty': qty},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        });
    </script>

@endpush