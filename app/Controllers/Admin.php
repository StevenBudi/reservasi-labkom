<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(){
        $data = [
            'path' => 'admin'
        ];
        return view('/admin/index.php', $data);
    }
}
