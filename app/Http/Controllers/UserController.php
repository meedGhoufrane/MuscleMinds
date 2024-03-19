<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;


use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('admin.users.index', compact('users'));
    }

    public function delete(int $userId)
    {
        User::findOrFail($userId)->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    public function edit($userId)
    {
        $user = User::findOrFail($userId);
        return view('admin.users.edit', compact('user'));
    }

    
    public function update(int $userId, array $data)
    {
        $user = User::findOrFail($userId);
        $user->update($data);
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
}
