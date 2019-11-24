<?php
namespace App\Contracts\Repositories;

interface AbtractRepository
{
    public function getAllData();
    public function deleteById($id);
}
interface AccountRepositoryInterface
{
    public function getDataAccount($username , $password);
}

interface ProductRepositoryInterface extends AbtractRepository
{

    public function addNewData($dataProduct);
    public function getDataById($id);
    public function updateData ($Id,$dataProduct);

}
