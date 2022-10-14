<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Category;

class LaravelformController extends Controller
{
    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function laravelformShow()
    {
        $data = $this->userRepository->getUserinfo();
        $categories = Category::all();
        return view('user.laravelform',compact('data','categories'));
    }
}
