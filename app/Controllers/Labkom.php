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

    public function update_modal($id){
        if ($this->request->isAJAX()) {
            $data = [
                'item' => $this->labkomModel->find($id)
            ];

            $result = [
                'data' => view('/template/facility.php', $data)
            ];

            return $this->response->setJSON($result);
        } else {
            exit('data tidak dapat ditampilkan');
        }
    }

    public function update($id){
        $input = [
            'id' => $id,
            'pc' => $this->request->getVar('labkom-pc'),
            'meja' => $this->request->getVar('labkom-meja'),
            'kursi' => $this->request->getVar('labkom-kursi'),
            'papan tulis' => $this->request->getVar('labkom-papan'),
            'papan tulis' => $this->request->getVar('labkom-papan'),
            'penghapus' => $this->request->getVar('labkom-penghapus'),
            'penghapus' => $this->request->getVar('labkom-penghapus'),
            'kabel VGA' => $this->request->getVar('labkom-vga')
        ];

        $this->labkomModel->save($input);
        $pesan = [
            'sukses' => "Data telah diupdate"
        ];
        return $this->response->setJSON($pesan);
    }
}
