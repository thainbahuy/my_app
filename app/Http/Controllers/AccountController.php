<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use App\Repositories\AccountRepository;
use App\Contracts\Repositories\AccountRepositoryInterface;

class AccountController extends Controller
{
    public function __construct(AccountRepositoryInterface $accountRepository) {
        $this->accountRepository = $accountRepository;
    }

    /**
     * Display a list of Account user.
     * @param Request
     * @return array Data user object
     */
    public function index()
    {
        $data['listAccount'] =  $this->accountRepository->getAllData();
        return view('homepage',$data);
    }
    /**
     * Add new Data User into Database
     * @param Request
     * @return redirect
     */
    public function addNewData(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $this->accountRepository->addNewData($username,$password);
        return redirect('/home');
    }

    /**
     * Get Data User by Id
     * @param Request
     * @return array Data user object
     */
    public function getDataById(Request $request)
    {
        $data['dataUser'] = $this->accountRepository->getDataById($request->id);
        return view('update',$data);

    }

    /**
     * Update data User by Id
     * @param Request
     * @return redirect
     */
    public function update(Request $request)
    {
        $this->accountRepository->updateData ($request->id , $request->username , $request->password );
        return redirect('/home');
    }

    /**
     * Delete Data user By Id
     * @param Request
     * @return redirect
     */
    public function deleteById(Request $request)
    {
        $this->accountRepository->deleteById($request->id);
        return redirect('/home');

    }
}
