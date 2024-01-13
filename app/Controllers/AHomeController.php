<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AhomeController extends BaseController
{

    public function adminManage()
    {
        return view('ADMIN/manage'); // Adjust the view path based on your folder structure
    }

    public function adminBanner()
    {
        return view('ADMIN/adminbanner'); // Adjust the view path based on your folder structure
    }

}
