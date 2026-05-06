<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Page extends BaseController
{
    public function about()
    {
        return view('about', ['title' => 'About Us']);
    }

    public function contact()
    {
        return view('contact', ['title' => 'Contact Us']);
    }
}
