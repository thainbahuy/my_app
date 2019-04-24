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
            return redirect('/products');
        }else{
            var_dump('ng');
            var_dump($this->accountRepository->getDataAccount($request->username , $request->password));
        }
    }
}
