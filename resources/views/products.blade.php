@extends('layouts.main')

@section('body')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div>
                <h5>Category Managment</h5>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#newCategoryModal">
                    Add New Category
                </button>   
                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                    data-bs-target="#newSabCategoryModal">
                    Add New Sub Category
                </button>
            </div>
            <form action="/add-products" method="post" id="add_product_form">
                @csrf
                <!-- {{ csrf_field() }} -->
                <div class="form-group">
                    <h2 class="font-weight-bold">Add your product details</h2>
                </div>
                <div class="form-group">
                    <label for="product-name">Product Name</label>
                    <input class="form-control" required type="text" name="name">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input class="form-control" required type="number" name="quantity">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category_id" id="" onChange="load_sc()">
                        @foreach($cats as $cat)
                        <option class="text-uppercase" value="{{$cat->id}}" data-name="{{$cat->name}}" >{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Sub Category</label>
                    <select class="form-control" name="sub_category_id" id="">
                        @foreach($subCats as $subCat)
                        <option class="text-uppercase" value="{{$subCat->id}}">{{$subCat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-dark">Add</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h1>Product List</h1>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Sub Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th>{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->sub_category->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- New Category Modal -->
<div class="modal fade" id="newCategoryModal" tabindex="-1" aria-labelledby="newCategoryModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="/add-category" method="post">
                @csrf
                <!-- {{ csrf_field() }} -->
                <div class="form-group">
                    <h5>Add New Category</h5>
                </div>
                <div class="form-group">
                    <label for="category">Category Name</label>
                    <input class="form-control" type="text" name="category_name">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Add</button>
                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- New Sub Category Modal -->
<div class="modal fade" id="newSabCategoryModal" tabindex="-1" aria-labelledby="newSabCategoryModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="/add-sub-category" method="post">
                    @csrf
                    <!-- {{ csrf_field() }} -->
                    <div class="form-group">
                        <h5>Add New Sub Category</h5>
                    </div>
                    <div class="form-group">
                        <label for="category">Category Name</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Parent Category</label>
                        <select name="parent_category" class="form-control">
                            @foreach($cats as $cat)
                            <option class="text-uppercase" value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark">Add</button>
                        <a type="button" class="btn btn-primary">Save changes</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    
    let sub_categories = {!! json_encode($subCats,true) !!}
    console.log("sub_cats",sub_categories);
    function load_sc(){
        let category_id = $('#add_product_form select[name="category_id"]').val();
        console.log("cat",category_id);
        let html = ``;

        sub_categories.forEach((sc)=>{
            if(parseInt(sc.category_id) == parseInt(category_id))
            {
                html += `<option class="text-uppercase" value="${sc.id}">${sc.name}</option>`;
            }
        });

        $('[name="sub_category_id"]').html(html);


    }
    </script>
    