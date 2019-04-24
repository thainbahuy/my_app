<?php

namespace App\Repositories;

//use Your Model
use App\Contracts\Repositories\AccountRepositoryInterface;
use App\Account;
/**
 * Class AccountRepository.
 */
class AccountRepository implements AccountRepositoryInterface
{

    public function getAllData()
    {
        // TODO: Implement getAllData() method.
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }

    public function getDataAccount($username, $password)
    {
        return Account::where('Username','=',$username)->where('Password','=',$password)->get()->count();
    }
}
