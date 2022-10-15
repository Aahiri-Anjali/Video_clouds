<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Category;
use App\Http\Requests\LaravelformRequest;
use App\Models\LaravelForm;

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

    public function laravelformSubmit(LaravelformRequest $request)
    {
        // dd($request->all());

        $validate = $request->validated();
        // $filename='';
        if(isset($request['image']))
        {
            $filename = time().$request['image']->getClientOriginalName();
            $request['image']->move(storage_path().'/upload/',$filename);
            $image = $filename;
        }
        $insert = LaravelForm::create(['first_name'=>$request['fname'],
                                        'last_name'=>$request['lname'],
                                        'address'=>$request['address'],
                                        'fruits'=>json_encode($request['fruits']),
                                        'email'=>$request['email'],
                                        'state'=>$request['state'],
                                        'zip_code'=>$request['zip'],
                                        'file'=>$image,
                                        'gender'=>$request['gender']
                                    ]);
        return back()->with('success','Data Submitted');
    }
}
