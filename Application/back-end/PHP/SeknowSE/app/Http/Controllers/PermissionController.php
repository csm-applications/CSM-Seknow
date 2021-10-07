<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return Permission::all();
    }

    public function store(Request $request)
    {
         Permission::create($request->all());  
    }

    public function show($id)
    {
        return Permission::findOrFail($id);
    }

     public function update(Request $request, $id)
    {
        $uc = Permission::findOrFail($id);
        $uc->update($request->all());       
    }

    public function destroy($id)
    {
        $uc = Permission::findOrFail($id);
        $uc->delete();
    }
}
