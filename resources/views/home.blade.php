@extends('layouts.app')

@section('main')

<div class="container">
    <div class="jumbotron dashboard-header" style="padding: 0px !important;">
        <h1 class="display-4 border-bottom-5px border-color-red" style="margin-top: 2em">Welcome, <span class="text-uppercase primary-text font-weight-bold">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</span> </h1>
    </div>

    <div class="row">
        <div class="col-md-2 my-2">
            <a class="dashboard-large-btn" href="/all-ba-girls">
                <span class="dashboard-large-btn-label">Beauty Advisors</span>
            </a>
        </div>
        <div class="col-md-2 my-2">
            <a class="dashboard-large-btn" href="/beauty-advisors">
                <span class="dashboard-large-btn-label">Add Beauty Advisors</span>
            </a>
        </div>
        
        <div class="col-md-2 my-2">
            <a class="dashboard-large-btn" href="/all-products">
                <span class="dashboard-large-btn-label">Products</span>
            </a>
        </div>
        <div class="col-md-2 my-2">
            <a class="dashboard-large-btn" href="/add-products-form">
                <span class="dashboard-large-btn-label">Add Product Form</span>
            </a>
        </div>
        
        <div class="col-md-2 my-2">
            <a class="dashboard-large-btn" href="/all-categories">
                <span class="dashboard-large-btn-label">All Categories</span>
            </a>
        </div>
        <div class="col-md-2 my-2">
            <a class="dashboard-large-btn" href="/add-category-form">
                <span class="dashboard-large-btn-label">Add Categories</span>
            </a>
        </div>
        
        <div class="col-md-2 my-2">
            <a class="dashboard-large-btn" href="/all-sub-categories">
                <span class="dashboard-large-btn-label">All Sub-Categories</span>
            </a>
        </div>
        <div class="col-md-2 my-2">
            <a class="dashboard-large-btn" href="/all-categories">
                <span class="dashboard-large-btn-label">Add Sub-Categories</span>
            </a>
        </div>
        <div class="col-md-2 my-2">
            <a class="dashboard-large-btn" href="/all-stores">
                <span class="dashboard-large-btn-label">Stores</span>
            </a>
        </div>
        <div class="col-md-2 my-2">
            <a class="dashboard-large-btn" href="/all-stores">
                <span class="dashboard-large-btn-label">Stores</span>
            </a>
        </div>
        
        <div class="col-md-2 my-2">
            <a class="dashboard-large-btn" href="/add-store-form">
                <span class="dashboard-large-btn-label">Add Stores</span>
            </a>
        </div>
    </div>
</div>

@endsection
