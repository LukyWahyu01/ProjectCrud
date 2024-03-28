<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ProfileModel extends Model
{   public function alldata()
    {
    return DB::table('profile')->get();
}
public function addData($data)
{
    return DB::table("profile")->insert($data);
}
public function find($id)
{
    return DB::table("profile")->where('id',$id)->first();
}

public function editData($data, $id)
   {
    return DB::table('profile')
    ->where('id',$id)
    ->update($data);
    
   }
//    public function deleteData($id)
//    {
//        return DB::table("profile")
//        ->where('id',$id)
//        ->delete();
//    }

}
