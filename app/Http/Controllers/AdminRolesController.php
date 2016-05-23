<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminRolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create(){
        return view('admin.roles.create');
    }


    public function store(Request $request)
    {
        Role::create($request->all());
        Session::flash('create_role', 'Role has been created');
        return redirect('/admin/roles');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        Session::flash('edit_role', 'Role has been updated');
        return redirect('/admin/roles');
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        Session::flash('delete_role', 'Role has been deleted');
        return redirect('/admin/roles');
    }
}
