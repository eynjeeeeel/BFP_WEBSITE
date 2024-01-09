<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function home()
    {
        return view('WEBSITE/home');
    }

    public function contactUs()
    {
        return view('COMPONENTS/contactus');
    }
    public function banner()
    {
        return view('COMPONENTS/banner');
    }
}
