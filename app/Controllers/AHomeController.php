<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AhomeController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function adminHome()
    {
        return view('ADMIN/adminhome'); // Adjust the view path based on your folder structure
    }

    public function adminContactUs()
    {
        return view('ADMIN/admincontactus'); // Adjust the view path based on your folder structure
    }

    public function adminBanner()
    {
        return view('ADMIN/adminbanner'); // Adjust the view path based on your folder structure
    }

    public function adminLogout()
    {
        $this->session->setFlashdata('logout_success', 'Admin Logout successful!');
        return view('ADMIN/adminlogin'); // Adjust the view path based on your folder structure
    }
}
