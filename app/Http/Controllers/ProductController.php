<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;


    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {

        if ($request->session()->has('dataUser')) {
            return view('HomeVueJs');
        } else {
            return redirect('login');
        }

    }

    /*public function deleteById(Request $request){
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
    }*/

//API
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:5',
            'title' => 'required|min:5',
            'price' => 'required|numeric'
        ]);
        $dataProduct = array(
            'Name' => $request->name,
            'Title' => $request->title,
            'Price' => $request->price
        );
        $this->productRepository->addNewData($dataProduct);
        return response([
            'result' => 'Add New Product Success'
        ], 200);


    }

    public function getListProduct(Request $request)
    {

        $listProduct = $this->productRepository->getAllData();
        return response(['result' => $listProduct]
            , 200);
    }

    public function deleteById(Request $request)
    {

        $this->productRepository->deleteById($request->id);
        return response(['result' => 'Delete Product success']
            , 200);

    }

    public function updateData(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:5',
            'title' => 'required|min:5',
            'price' => 'required|numeric'
        ]);

        $dataProduct = array(
            'Name' => $request->name,
            'Title' => $request->title,
            'Price' => $request->price
        );
        $this->productRepository->updateData($request->id, $dataProduct);
        return response(['result' => 'Update Product success']
            , 200);


    }

}
