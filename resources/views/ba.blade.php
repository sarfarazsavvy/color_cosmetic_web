@extends('layouts.app')

@section('main')

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="font-weight-bold my-5 text-capitalize primary-text">Create Beauty Advisor</h1>
        </div>
        <div class="col-12">
            <form action="/create-beauty-advisors" method="post">
                @csrf
                <div class="form-group">
                    <label  class="font-weight-bold mb-1" for="">Name</label>
                    <input name="name" required type="text" class="form-control">
                </div>
                <div class="form-group mt-4">
                    <label class="font-weight-bold mb-1"  for="">Email</label>
                    <input name="email" required type="email" class="form-control">
                </div>
                <div class="form-group mt-4">
                    <label class="font-weight-bold mb-1"  for="">Password</label>
                    <input name="password" required type="password" class="form-control">
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn bg-red text-white">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection