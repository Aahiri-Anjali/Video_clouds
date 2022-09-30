<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    public $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function userInfo()
    {
       $data = $this->userRepository->getUserinfo();
       return view('user.userdetail',compact('data'));
    }
}
