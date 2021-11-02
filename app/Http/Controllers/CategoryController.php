<?php

namespace App\Http\Controllers;
use App\Category;
use App\SubCategory;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = Category::get();
        return view('all-categories', compact('categories'));

    }

    public function create()
    {

        return view('add-categories');

    }

    public function store(Request $req)
    {

        $category = new Category;
        $category->name = $req->name;
        $category->save();

        return redirect()->back()->with('success', 'Category Added Succesfully!');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('edit_categories', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        if ($category) {
            request()->session()->flash('success', 'Category successfully updated');
        } else {
            request()->session()->flash('error', 'Error, Please try again');
        }
        return redirect()->route('category.index');
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            $status = $category->delete();
            if ($status) {
                request()->session()->flash('success', 'Categories successfully deleted');
            } else {
                request()->session()->flash('error', 'Error, Please try again');
            }
            return redirect()->route('category.index');
        } else {
            request()->session()->flash('error', 'Category not found');

        }
        return redirect()->back();
    }

    public function show()
    {

    }

}