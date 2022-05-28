<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index(){
        $data = [
            'path' => 'about'
        ];
        return view('/about.php', $data);
    }
}
