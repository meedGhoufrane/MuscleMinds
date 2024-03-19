<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function create(array $data);

    public function findByEmail(string $email);

    public function getAll();

    public function delete(int $userId);
    
    public function update(int $userId, array $data);

}
