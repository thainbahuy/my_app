<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }
    public function index(){
        $data['listProduct'] = $this->productRepository->getAllData();
        return view ('homepage', $data);
    }

    public function deleteById(Request $request){
        $this->productRepository->deleteById ($request->id);
        return redirect('/home');
    }

    public function addNewProduct(Request $request){
        $dataProduct = array(
            'Name' => $request->name,
            'Title' => $request->title,
            'Price' => $request->price
        );
        $this->productRepository->addNewData($dataProduct);
        return redirect('/home');
    }
}