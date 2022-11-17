<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CronejobController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function cronjobShow()
    {
        $data = $this->userRepository->getUserinfo();
        $categories = Category::all();
        // $user = Auth::user();
        // $user_email = Auth::user()->email;
        // dd($user_email);
        return view('user.cronjob',compact('data','categories'));
    }
}
