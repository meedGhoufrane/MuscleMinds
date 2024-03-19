<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
    public function getAll()
    {
        return User::all();
    }

    public function delete(int $userId)
    {
        return User::findOrFail($userId)->delete();
    }
    
    public function update(int $userId, array $data)
    {
        $user = User::findOrFail($userId);
        $user->update($data);
        return $user;
    }
}
