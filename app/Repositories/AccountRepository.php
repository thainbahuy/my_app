<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Account;
use App\Contracts\Repositories\AccountRepositoryInterface;

/**
 * Class AccountRepository.
 */
class AccountRepository implements AccountRepositoryInterface
{

    //Override
    /**
     * Get all data user
     */
    public function getAllData()
    {
        return Account::all();
    }

    //Override
    /**
     * Delete data by Id
     * @param id
     */
    public function deleteById( $id )
    {
        Account::where('Id',$id)->delete();

    }

    //override
    /**
     * Add new data user
     * @param username , password
     */
    public function addNewData( $username , $password )
    {
        $account = new Account;

        $account->Username = $username;
        $account->Password = $password;

        $account->save();
    }

    //override
    /**
     * Get data user by id
     * @param $id
     */
    public function getDataById($id)
    {
        return Account::select('Id','Username','Password')->where('Id',$id)->get();
    }

    //override
    /**
     * Update data user by id
     * @param id,username,password
     */
    public function updateData ($id , $username , $password )
    {
        Account::where('Id', '=', $id)->update(array('Username' => $username , 'Password' =>$password));
    }
}
