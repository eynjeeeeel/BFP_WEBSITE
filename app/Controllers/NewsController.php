<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;

class NewsController extends BaseController
{
    public function news()
    {
        $model = new NewsModel();

        $data = [
            'news' => $model->findAll(),
        ];

        return view('NEWS/NewsView', $data);
    }

    public function show($slug)
    {
        $model = new NewsModel();

        $data = [
            'news' => $model->where('slug', $slug)->first(),
        ];

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        return view('NEWS/NewsContent', $data);
    }

    public function create()
    {
        return view('NEWS/NewsCreate');
    }

    public function store()
    {
        $model = new NewsModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => url_title($this->request->getPost('title'), '-', true),
            'body' => $this->request->getPost('body'),
        ];

        $model->insert($data);

        return redirect()->to('news');
    }
}
