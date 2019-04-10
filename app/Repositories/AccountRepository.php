<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Account;

/**
 * Class AccountRepository.
 */
class AccountRepository
{
    public $timestamps = false;
    const UPDATED_AT = null;

    public function getAllData()
    {
        return Account::all();
    }

    public function deleteById($id)
    {
        // $account = Account::find($id);
        // $account->delete();
        Account::where('Id',$id)->delete();
    }
    public function addNewData($username,$password){
        $account = new Account;
        $account->Username = $username;
        $account->Password = $password;
        $account->save();
    }
}
