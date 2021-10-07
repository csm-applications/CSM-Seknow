<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Company;

class UserAccount extends Model
{
    use HasFactory;
    protected $table = "useraccount";
    protected $fillable = ["name", "email", "password", "phone", "active", "birth_date", "start_work", "user_type", "Grouping", "worksIn"];
    public $timestamps = false;

    protected $hidden = [
        'password',
        'remember_token',
    ];



    public static function findByMail($email){
        $rows = DB::table("UserAccount")->where('email', $email)->first();
        return $rows;
    }

    public static function filterByName($name){
        $rows = DB::table("UserAccount")->where('nome','like', "%".$name."%")->get();
        return $rows;
    }

    public static function filterByCompany($id){
        $rows = DB::table("UserAccount")->where('id_company', $id)->get();
        return $rows;
    }

     public function worksIn()
    {
        return $this->belongsTo(Company::class);
    }

    public function owner()
    {
        return $this->hasOne(Company::class);
    }

}
