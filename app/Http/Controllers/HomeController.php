<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Video;
use App\Models\Category;

class HomeController extends Controller
{
    public $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('auth');
         $this->userRepository = $userRepository;
    }

    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $data = $this->userRepository->getUserinfo();
    //     return view('layouts.front_main',compact('data'));
    // }

    public function dashboard()
    {
        $data = $this->userRepository->getUserinfo();
        $categories = Category::all();
        $lastvideo = Video::where('upload_type','upload_video')->latest()->first();
        $videos = Video::where('upload_type','upload_video')->get();
        return view('home',compact('data','lastvideo','videos','categories'));
    }
}
