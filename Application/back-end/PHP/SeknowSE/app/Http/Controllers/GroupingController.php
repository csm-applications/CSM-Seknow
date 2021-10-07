<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grouping;

class GroupingController extends Controller
{
   public function index()
    {
        return Grouping::all();
    }

    public function store(Request $request)
    {
         Grouping::create($request->all());  
    }

    public function show($id)
    {
        return Grouping::findOrFail($id);
    }

     public function update(Request $request, $id)
    {
        $uc = Grouping::findOrFail($id);
        $uc->update($request->all());       
    }

    public function destroy($id)
    {
        $uc = Grouping::findOrFail($id);
        $uc->delete();
    }
}
