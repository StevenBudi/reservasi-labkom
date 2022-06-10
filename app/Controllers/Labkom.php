<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Labkom as ModelsLabkom;

class Labkom extends BaseController
{

    public function __construct()
    {
        $this->labkomModel = new ModelsLabkom();
    }
    public function index()
    {
        $data = [
            'path' => 'labkom',
            'rpl' => $this->labkomModel->find(1),
            'mulmed' => $this->labkomModel->find(2),
            'tkj' => $this ->labkomModel->find(3)
        ];
        return view('lab_vw', $data);
    }
}
