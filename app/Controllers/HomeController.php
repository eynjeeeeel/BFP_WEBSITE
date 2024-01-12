<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    public function home()
    {
        return view('WEBSITE\home');
    }

    public function contactUs()
    {
        return view('COMPONENTS/contactus');
    }

    public function banner()
    {
        return view('COMPONENTS/banner');
    }

    public function logout()
    {
       $this->session->setFlashdata('logout_success', 'Logout successful!');

            return view('LOGIN/login');
        
    }
}
