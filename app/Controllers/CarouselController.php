<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CarouselModel;

class CarouselController extends BaseController
{

    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function carouselhome()
    {
        $carouselModel = new CarouselModel();
        $image_path = $carouselModel->findAll();
        $data['image'] = $image_path;
    
        return view('WEBSITE/home', $data);
    }
    

    public function addImages()
{
    $carouselModel = new CarouselModel();

    $data['carousel_images'] = $carouselModel->findAll();

    if ($this->request->getFiles()) {
        foreach ($this->request->getFiles()['image_path'] as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();

                $image->move(ROOTPATH . 'public/carousel_images', $newName);

                $carouselModel->insert(['image_path' => 'carousel_images/' . $newName]);
            }
        }
    }

    return view ('ACOMPONENTS/CAROUSEL/carouselmaincontent');
}


    public function store()
{
    helper(['form', 'url', 'session']);
    
    $rules = [
        'image_path' => 'uploaded[image_path]|max_size[image_path,10000]|mime_in[image_path,image/jpeg,image/png,image/heic,image/jpg]|ext_in[image_path,png,jpg,jpeg,heic]',
    ];
    
    $messages = [
        'image_path' => [
            'uploaded' => 'Carousel Image is required.',
            'max_size' => 'Carousel Image size should not exceed 10MB.',
            'mime_in' => 'Invalid file type for Carousel Image. Please upload a valid image file.',
        ],
    ];
    
    if ($this->validate($rules, $messages)) {
        $carouselModel = new CarouselModel();
        
        $imageFile = $this->request->getFile('image_path');
        
        $imageFileName = $imageFile->getRandomName();
        
        $imageFile->move(ROOTPATH . 'public/carousel_images', $imageFileName);
        
        $carouselModel->insert(['image_path' => 'carousel_images/' . $imageFileName]);
        
        $this->session->setFlashdata('success', 'Carousel Image uploaded successfully!');
        
        return redirect()->to('carouselhome');
    } else {
        $data['validation'] = $this->validator;
        return view('ACOMPONENTS/CAROUSEL/carouselmaincontent', $data);
    }
}


    public function edit($carousel_id)
    {
        $carouselModel = new CarouselModel();

        $carousel_images = $carouselModel->find($carousel_id);

        if (empty($carousel_images)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the carousel image with ID: ' . $carousel_id);
        }

        $data = [
            'image' => $carousel_images,
            'selected_carousel_id' => $carousel_id,
        ];

        return view('ACOMPONENTS/CAROUSEL/crsladdImages', $data);
    }

    public function update()
    {
        helper(['form', 'url', 'session']);

        $carousel_id = $this->request->getPost('carousel_id');

        $carouselModel = new CarouselModel();

        $carousel_images = $carouselModel->find($carousel_id);

        if (empty($carousel_images)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the carousel image with ID: ' . $carousel_id);
        }

        $rules = [
            'image_path' => 'max_size[image_path,5000]|mime_in[image_path,image/jpeg,image/png,image/heic,image/jpg]|ext_in[image_path,png,jpg,jpeg,heic]',
        ];

        $messages = [
            'image_path' => [
                'max_size' => 'Image size should not exceed 5MB.',
                'mime_in' => 'Invalid file type for image. Please upload a valid image file.',
            ],
        ];

        if ($this->validate($rules, $messages)) {
            $newImage = $this->request->getFile('image_path');

            if ($newImage->isValid()) {
                $newName = $newImage->getRandomName();

                $newImage->move(ROOTPATH . 'public/carousel_images', $newName);

                $carouselModel->update($carousel_id, ['image_path' => 'carousel_images/' . $newName]);

                if (file_exists(ROOTPATH . 'public/carousel_images' . $carousel_images['image_path'])) {
                    unlink(ROOTPATH . 'public/carousel_images' . $carousel_images['image_path']);
                }
            }

            $this->session->setFlashdata('success', 'Carousel image updated successfully!');

            return redirect()->to('crsladdImages');
        } else {
            $data['validation'] = $this->validator;
            return view('ACOMPONENTS/CAROUSEL/crsladdImages', $data);
        }
    }

    public function delete($carousel_id)
    {
        $carouselModel = new CarouselModel();

        $image_path = $carouselModel->find($carousel_id);

        if (empty($image_path)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the carousel image with ID: ' . $carousel_id);
        }

        $carouselModel->delete($carousel_id);

        if (file_exists(ROOTPATH . 'public/carousel_images' . $image_path['image_path'])) {
            unlink(ROOTPATH . 'public/carousel_images' . $image_path['image_path']);
        }

        $this->session->setFlashdata('success', 'Carousel image deleted successfully!');

        return redirect()->to('crsladdImages');
    }
}
