<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Repositories\AccountRepository;

class HomeController extends Controller
{
    protected $accountRepository;

    public function __construct(AccountRepository $accountRepository) {
        $this->accountRepository = $accountRepository;
    }

    public function index(){
        $data['listAccount'] =  $this->accountRepository->getAllData();
        return view('homepage',$data);
    }

    public function deleteById(Request $request){
        $this->accountRepository->deleteById($request->id);
        return redirect('/home');
    }
}
