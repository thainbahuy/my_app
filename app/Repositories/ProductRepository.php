<?php

namespace App\Repositories;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Product;
//use Your Model

/**
 * Class ProductRepository.
 */
class ProductRepository implements ProductRepositoryInterface
{
    //overide
    public function getAllData()
    {
        return Product::select('Id','Name','Title','Price')->get();
    }

    //overide
    public function deleteById($id)
    {
        Product::where('Id', '=', $id)->delete();
    }

    //overide
    public function addNewData($dataProduct)
    {

        $product = new Product();
        $product->Name = $dataProduct['Name'];
        $product->Title = $dataProduct['Title'];
        $product->Price = $dataProduct['Price'];

        $product->save();

        return $product->id;

    }

    public function updateData($Id,$dataProduct)
    {
        Product::where('Id','=',$Id)->update($dataProduct);
    }

    public function getDataById($id)
    {
        return Product::where('Id','=',$id)
            ->select('Id','Name','Title','Price')
            ->first();
    }
}
