<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Category;


class ImportExcelController extends Controller
{
    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function importexcelShow()
    {
        $data = $this->userRepository->getUserinfo();
        $categories = Category::all();
        return view('user.importexcel',compact('data','categories'));
    }
}
