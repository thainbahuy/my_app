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
    /**
     * @return string
     *  Return the model
     */
    public function getAllData()
    {
        return Account::getAllData();
    }

    public function deleteById($id)
    {
        return Account::deleteById($id);
    }
}
