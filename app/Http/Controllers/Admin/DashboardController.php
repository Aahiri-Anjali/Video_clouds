<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $admin =Auth::guard('admin')->user();
        $data=compact('admin');
        return view('admin.dashboard')->with($data);
    }
}
