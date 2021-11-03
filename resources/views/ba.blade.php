@extends('layouts.app')

@section('main')

<div class="container py-5 my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="font-weight-bold my-5 primary-text">Create Beauty Advisor</h1>
        </div>
        <div class="col-12">
            <form action="/create-beauty-advisors" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" required type="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" required type="password" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn bg-red text-white">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection