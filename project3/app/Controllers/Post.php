<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Post extends BaseController
{
    public function index(): string
	{
        // buat object model $post
        $post = new PostModel();

        /*
        siapkan data untuk dikirim ke view dengan nama $posts
        dan isi datanya dengan post yang sudah terbit
        */
        $data['posts'] = $post->where('status', 'published')->findAll();

        // siapkan data untuk dikirim ke view
        $data['title'] = 'Daftar Blog';
        return view('post', $data);
	}

	//------------------------------------------------------------

	public function viewPost($slug): string
	{
		$post = new PostModel();
		$data['post'] = $post->where([
			'slug' => $slug,
			'status' => 'published'
		])->first();

        // tampilkan 404 error jika data tidak ditemukan
		if (!$data['post']) {
			throw PageNotFoundException::forPageNotFound();
		}

        $data['title'] = $data['post']['title'];
		return view('post_detail', $data);
	}
}