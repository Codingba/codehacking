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
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.index');
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
        //
    }

    public function update(Request $request, $id)
    {
        Session::flash('deleted_user', 'User has been deleted');
    }

    public function destroy($id)
    {
        Session::flash('deleted_user', 'User has been deleted');
    }
}
