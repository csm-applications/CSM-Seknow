<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
   public function index()
    {
        return Company::all();
    }

    public function store(Request $request)
    {
         Company::create($request->all());  
    }

    public function show($id)
    {
        return Company::findOrFail($id);
    }

     public function update(Request $request, $id)
    {
        $uc = Company::findOrFail($id);
        $uc->update($request->all());       
    }

    public function destroy($id)
    {
        $uc = Company::findOrFail($id);
        $uc->delete();
    }
}
