<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;

class NewsController extends BaseController
{

    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function news()
    {
        $newsModel = new NewsModel();

        $data = [
            'news' => $newsModel->findAll(),
        ];

        return view('NEWS/NewsView', $data);
    }

    public function show($slug)
    {
        $newsModel = new NewsModel();

        $data = [
            'news' => $newsModel->where('slug', $slug)->first(),
        ];

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        return view('NEWS/NewsContent', $data);
    }

    public function newscreate()
    {
        return view('ACOMPONENTS/NEWS/newsmaincontent');
    }

    public function store()
    {
        helper(['form', 'url', 'session']);

        $rules = [
            'title' => 'required|max_length[255]',
            'content' => 'required',
            'image' => 'uploaded[image]|max_size[image,5000]|mime_in[image,image/jpeg,image/png,image/heic,image/jpg]|ext_in[image,png,jpg,jpeg,heic]',
        ];

        $messages = [
            'title' => [
                'required' => 'News Title is required.',
                'max_length' => 'News Title should not exceed 255 characters.',
            ],
            'content' => [
                'required' => 'News Content is required.',
            ],
            'image' => [
                'uploaded' => 'News Image is required.',
                'max_size' => 'News Image size should not exceed 5MB.',
                'mime_in' => 'Invalid file type for News Image. Please upload a valid image file.',
            ],
        ];

        if ($this->validate($rules, $messages)) {
            $newsModel = new NewsModel();

            // Handle file uploads
            $imageFile = $this->request->getFile('image');

            // Generate random names
            $imageFileName = $imageFile->getRandomName();

            // Move files to the specified directory
            $imageFile->move(ROOTPATH . 'public/uploads', $imageFileName);

            $data = [
                'title' => $this->request->getPost('title'),
                'slug' => url_title($this->request->getPost('title'), '-', true),
                'content' => $this->request->getPost('content'),
                'image' => $imageFileName,
            ];

            $newsModel->insert($data);

            $this->session->setFlashdata('success', 'News created successfully!');

            return redirect()->to('newscreate');
        } else {
            $data['validation'] = $this->validator;
            return view('ACOMPONENTS/NEWS/newsmaincontent', $data);
        }
    }
}
