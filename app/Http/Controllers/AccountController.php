<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use App\Repositories\AccountRepository;

class AccountController extends Controller
{
    public function __construct(AccountRepository $accountRepository) {
        $this->accountRepository = $accountRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['listAccount'] =  $this->accountRepository->getAllData();
        return view('homepage',$data);
    }


    public function create(Request $request)
    {

    }


    public function addNewData(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        // $userData = array('Username' => $username, 'Password' => $password);
        $this->accountRepository->addNewData($username,$password);
        return redirect('/home');
    }


    public function show(Account $account)
    {
        //
    }


    public function edit(Account $account)
    {
        //
    }


    public function update(Request $request, Account $account)
    {
        //
    }


    public function deleteById(Request $request)
    {
        $this->accountRepository->deleteById($request->id);
        return redirect('/home');

    }
}
