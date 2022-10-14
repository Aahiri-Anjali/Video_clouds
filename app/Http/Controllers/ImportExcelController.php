<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Category;
use App\Imports\ImportExcel;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ImportExcelModel;
use  App\Exports\ExportExcel;


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

    public function importexcel(Request $request)
    {
        $validated = $request->validate(['file'=>'required|mimes:xls,xlsx']);
        $import = Excel::import(new ImportExcel,$request['file']);
        $data = $this->userRepository->getUserinfo();
        $categories = Category::all();
        if($import)
        {
            return redirect()->route('displayexcel');
        }

    }

    public function displayexcel()
    {
        $data = $this->userRepository->getUserinfo();
        $categories = Category::all();
        $excels = ImportExcelModel::all();
        return view('user.displayexceldata',compact('excels','categories','data'));
    }

    public function export()
    {
        return Excel::download(new ExportExcel, 'exort.xlsx');
    }
}
