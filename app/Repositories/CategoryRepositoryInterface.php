<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function all();

    public function create(array $data);


    public function find($id);


    public function delete(int $id);
    
    public function update($id, array $data);

}
