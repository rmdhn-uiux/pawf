<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PostAdmin extends BaseController
{
    public function index()
    {
        $post = new PostModel();
        $data['posts'] = $post->findAll();
        $data['title'] = 'Admin - List Post';
        return view('admin/admin_post_list', $data);
    }

    //--------------------------------------------------------------

    public function preview($id)
    {
        $post = new PostModel();
        $data['post'] = $post->where('id', $id)->first();

        if(!$data['post']){
            throw PageNotFoundException::forPageNotFound();
        }
        $data['title'] = $data['post']['title'];
        return view('post_detail', $data);
    }

    //--------------------------------------------------------------

    public function create()
    {
        // perform validation
        $rules = [
            'title' => 'required|min_length[5]',
            'content' => 'required'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $post = new PostModel();
            $post->insert([
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status'),
                "slug" => url_title($this->request->getPost('title'), '-', TRUE)
            ]);
            return redirect()->to('admin/post')->with('success', 'Data Berhasil Disimpan');
        }

        $data['validation'] = $this->validator;
        $data['title'] = 'Admin - Create Post';
        // display create form
        return view('admin/admin_post_create', $data);
    }

    //--------------------------------------------------------------

    public function edit($id)
    {
        // get the article to edit
        $post = new PostModel();
        $data['post'] = $post->where('id', $id)->first();
        
        if(!$data['post']){
            throw PageNotFoundException::forPageNotFound();
        }

        // perform validation
        $rules = [
            'title' => 'required|min_length[5]',
            'content' => 'required'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $post->update($id, [
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status')
            ]);
            return redirect()->to('admin/post')->with('success', 'Data Berhasil Diperbarui');
        }

        $data['validation'] = $this->validator;
        $data['title'] = 'Admin - Edit Post';
        // display edit form
        return view('admin/admin_post_update', $data);
    }

    //--------------------------------------------------------------

    public function delete($id)
    {
        $post = new PostModel();
        $post->delete($id);
        return redirect()->to('admin/post')->with('success', 'Data Berhasil Dihapus');
    }
}
