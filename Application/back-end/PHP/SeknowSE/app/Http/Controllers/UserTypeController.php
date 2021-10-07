<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserType;

class UserTypeController extends Controller
{
    public function index()
    {
        return UserType::all();
    }

    public function store(Request $request)
    {
         UserType::create($request->all());  
    }

    public function show($id)
    {
        return UserType::findOrFail($id);
    }

     public function update(Request $request, $id)
    {
        $uc = UserType::findOrFail($id);
        $uc->update($request->all());       
    }

    public function destroy($id)
    {
        $uc = UserType::findOrFail($id);
        $uc->delete();
    }
}
