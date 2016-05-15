<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        // $categories = Category::all()->orderBy('order', 'desc')->get();
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }


    public function store(Request $request)
    {
        Category::create($request->all());
        Session::flash('create_cat', 'Category has been created');
        return redirect('/admin/categories');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        Session::flash('edit_cat', 'Category has been updated');
        return redirect('/admin/categories');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        Session::flash('delete_cat', 'Category has been deleted');
        return redirect('/admin/categories');
    }
}
