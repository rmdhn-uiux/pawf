<?php

namespace App\Controllers;

use App\Models\PostModel;

class Home extends BaseController
{
    public function index(): string
    {
        $postModel = new PostModel();
        
        // Ambil 3 postingan terbaru yang sudah terbit
        $data['latest_posts'] = $postModel->where('status', 'published')
                                          ->orderBy('id', 'DESC')
                                          ->limit(3)
                                          ->findAll();
        
        $data['title'] = 'Home';
        
        return view('home', $data);
    }
}
