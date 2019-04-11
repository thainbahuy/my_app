<?php
namespace App\Contracts\Repositories;

interface AccountRepositoryInterface
{
    public function getAllData();
    public function deleteById($id);
    public function addNewData($username, $password);
    public function getDataById($id);
    public function updateData($id, $username, $password);

}

interface ProductRepositoryInterface
{
    public function getAllData();
    public function deleteById($id);
    public function addNewData($dataProduct);
    // public function getDataById();
    // public function updateData ();

}
