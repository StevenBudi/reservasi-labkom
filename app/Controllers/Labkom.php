<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Labkom as ModelsLabkom;
use App\Models\Member;

class Labkom extends BaseController
{

    public function __construct()
    {
        $this->labkomModel = new ModelsLabkom();
        $this->memberModel = new Member();
    }
    public function index()
    {
        $data = [
            'path' => 'labkom',
            'rpl' => $this->labkomModel->find(1),
            'mulmed' => $this->labkomModel->find(2),
            'tkj' => $this->labkomModel->find(3)
        ];
        return view('lab_vw', $data);
    }

    public function update_modal($id)
    {
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

    public function update($id)
    {
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

    public function reserve()
    {
        $userData = $this->memberModel->find(session()->get('id'));
        
        $waktu_pinjam = $this->request->getVar('peminjaman') ." " .$this->request->getVar('jam'); 
        $waktu_pinjam = date('Y-m-d H:i:s', strtotime($waktu_pinjam));

        $waktu_selesai = $this->request->getVar('peminjaman') . " " . $this->request->getVar('jam') + $this->request->getVar('duration');
        $waktu_selesai = date('Y-m-d H:i:s', strtotime($waktu_selesai));

        $input = [
            'peminjam' => $userData['nama'],
            'labkom' => $this->request->getVar('labkom-opt'),
            'waktu_peminjaman' => date('m/d/Y h:i:s', time()),
            'waktu_penggunaan' => $waktu_pinjam,
            'waktu_akhir_penggunaan' => $waktu_selesai,
            'status' => 'unfinished',
            'catatan' => $this->request->getVar('reser-notes')
        ];

        $db = db_connect();
        $query = $db->query('SELECT * FROM reservasi_labkom WHERE status == `unfinished` AND waktu_penggunaan <=' . $waktu_pinjam . ' AND waktu_akhir_penggunaan >= ' . $waktu_selesai);
        // Check hasil query ada atau tidak
        if (!empty($query)) {
            $this->labkomModel->save($input);
            $result = [
                'pesan' => 'Berhasil Reservasi'
            ];
        }else{
            $result = [
                'pesan' => 'Waktu anda bertabrakan'
            ];
        }
        return $this->response->setJSON($result);
    }
}
