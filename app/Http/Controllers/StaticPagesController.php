<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
 

class StaticPagesController extends Controller
{
    //
    public function home()
    {
        return view('static_pages/home');
    }
    public function help()
    {
        return view('static_pages/help');
    }
    public function about()
    {
        return view('static_pages/about');
    }
}
