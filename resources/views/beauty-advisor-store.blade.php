@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="font-weight-bold primary-text my-5">Assign Store to Beauty Advisor</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/assign-store-to-beauty-advisor" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Beauty Advisor</label>
                    <select name="user_id" class="form-control ba-girl-select">
                        @foreach( $baGirls as $baGirl) 
                            <option value="{{$baGirl->id}}">{{$baGirl->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Store</label>
                    <select name="store_id" class="form-control ba-girl-store-select">
                        @foreach( $stores as $store) 
                            <option value="{{$store->id}}">{{$store->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group text-center mt-3">
                    <button required type="submit" name="submit" class="btn bg-red text-white">Assign</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('custom-scripts')
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.ba-girl-select').select2();
        $('.ba-girl-store-select').select2();
    });
</script>
@endsection