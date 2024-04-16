<?php
// App/Repositories/BrandRepositoryInterface.php

namespace App\Repositories;


interface BrandRepositoryInterface
{
    public function all();
    public function create(array $data);

    
    public function find($id);


    public function update($id, array $data);

    public function destroy($id);




    // Other methods can be added here based on your needs
}
