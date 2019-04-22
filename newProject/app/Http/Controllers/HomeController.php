<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function add()
    {
        return view('admin.add');
    }


    public function index()
    {
        return view('admin.index');
    }
}
