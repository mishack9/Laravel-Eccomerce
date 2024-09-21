<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Admin Home
    public function index_adminHome()
    {
        return view('Admin.index');
    }

   //Home view
   public function home()
   {
    return view('home.index');
   }
}
