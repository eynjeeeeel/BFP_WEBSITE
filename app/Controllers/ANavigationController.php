<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ANavigationController extends BaseController
{
    public function adminManage()
    {
        return view('ADMINMANAGE/manage');
    }
}
