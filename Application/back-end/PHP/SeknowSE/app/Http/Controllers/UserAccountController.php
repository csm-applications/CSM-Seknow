<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use App\Models\Company;
use App\Http\Resources\UserAccountResource;

class UserAccountController extends Controller
{
    
   public function index()
    {
        $users = UserAccount::with(['worksIn']);
        return UserAccountResource::collection($users->paginate(50))->response();
    }

    public function store(Request $request)
    {
         UserAccount::create($request->all());  
    }

    public function show($id)
    {
        return UserAccount::findOrFail($id);
    }

    public function findByMail($email)
    {
       
        $rows = UserAccount::findByMail($email);
        echo json_encode($rows);
    }
    public function filterByName($name)
    {
       
        $rows = UserAccount::filterByName($name);
        echo json_encode($rows);
    }

    public function filterByCompany($id)
    {
       
        $rows = UserAccount::filterByCompany($id);
        echo json_encode($rows);
    }

     public function update(Request $request, $id)
    {
        $uc = UserAccount::findOrFail($id);
        $uc->update($request->all());       
    }

    public function destroy($id)
    {
        $uc = UserAccount::findOrFail($id);
        $uc->delete();
    }
}
