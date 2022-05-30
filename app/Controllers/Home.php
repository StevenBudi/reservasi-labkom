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

    public function reservation()
    {
        if ($this->request->isAJAX()) {
            $result = [
                'data' => view('/template/reservation.php')
            ];

            return $this->response->setJSON($result);
        } else {
            exit('data tidak dapat ditampilkan');
        }
    }
}
