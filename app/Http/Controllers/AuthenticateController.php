<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Repositories\AccountRepositoryInterface;

class AuthenticateController extends Controller
{
    protected $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function index(Request $request)
    {
        if(!empty($this->accountRepository->getDataAccount($request->username , $request->password))){
            $dataUser =  array('username' =>$request->username , 'password' => $request->password);
            $request->session()->put('dataUser' , $dataUser);
            return redirect('/home');
        }else{
            $request->session()->flash('alert-warning', 'Incorrect Username and Password');
            return redirect('login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('dataUser');
        return redirect('login');
    }
}
