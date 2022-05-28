<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'path' => 'home'
        ];
        return view('index', $data);
    }
}
