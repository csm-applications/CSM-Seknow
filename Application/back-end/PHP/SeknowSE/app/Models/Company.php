<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserAccount;

class Company extends Model
{
    use HasFactory;
    protected $table = "company";
    protected $fillable = ["name", "phone", "foundationDate", "description", "owner"];
    public $timestamps = false;


     public function employees()
    {
        return $this->hasMany(UserAccount::class);
    }

     public function owner()
    {
        return $this->belongsTo(UserAccount::class);
    }

  

}
