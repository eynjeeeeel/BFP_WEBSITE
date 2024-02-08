<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CarouselModel;
use CodeIgniter\HTTP\ResponseInterface;

class CarouselController extends BaseController
{
    public function index()
    {
        $carouselModel = new CarouselModel();
        $data['imageSources'] = $carouselModel->findAll();
        
        return view('WEBSITE/home', $data);
    }
}
