<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


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
        $latestcategories =[];
        foreach($categories as $category)
        {       
            $latest = $videos = Video::where('upload_type','upload_video')->where('category_id',$category->id)->with('category')->latest()->take(3)->get();
            $latestId = array_push($latestcategories,$latest);
        }
        // dd($latestcategories);

        $lastvideo = Video::where('upload_type','upload_video')->latest()->first();
        $lastvideos = Video::where('upload_type','upload_video')->latest()->take(3)->get();
        $videos = Video::where('upload_type','upload_video')->select('category_id', DB::raw('count(*) as total'))->groupBy('category_id')->get();
        return view('home',compact('data','lastvideo','lastvideos','videos','categories','latestcategories'));
    }
}
