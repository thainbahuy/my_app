<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Account extends Model
{
    public static function getAllData(){
        return DB::select('select * from ACCOUNT');
    }
    public static function deleteById($id){
        return DB::delete('delete from ACCOUNT where Id = ?', [$id]);
    }
}
