<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Labkom as ModelsLabkom;
use App\Models\Member;
use App\Models\ReservasiLabkom;

class Labkom extends BaseController
{

    protected $labkomModel;
    public function __construct()
    {
        $this->labkomModel = new ModelsLabkom();
        $this->memberModel = new Member();
        $this->reservasi = new ReservasiLabkom();
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
            'penghapus' => $this->request->getVar('labkom-penghapus'),
            'penghapus' => $this->request->getVar('labkom-penghapus'),
            'kabel_VGA' => $this->request->getVar('labkom-vga')
        ];
        $this->labkomModel->save($input);
        $pesan = [
            'sukses' => "Data telah diupdate"
        ];
        return $this->response->setJSON($pesan);
    }

    public function jadwal_labkom()
    {
        if ($this->request->isAJAX()) {
            $condition = array('status' => 'unfinished', 'waktu_penggunaan >=' => date("Y:m:d H:i:s"));
            $result = [
                'list' => $this->reservasi->where($condition)->findAll(),
                $this->reservasi->where
            ];
            $hasil = [
                'data' => view('/template/schedule', $result)
            ];

            return $this->response->setJSON($hasil);
        } else {
            exit("Data tidak dapat ditampilkan");
        }
    }

    public function reserve()
    {
        $userData = $this->memberModel->find(session()->get('id'));
        $waktu_pinjam = $this->request->getVar('peminjaman') . " " . $this->request->getVar('jam');
        $waktu_pinjam = date('Y-m-d H:i:s', strtotime($waktu_pinjam));
        $waktu_selesai = date('Y-m-d H:i:s', strtotime($waktu_pinjam . sprintf(' + %u hour', $this->request->getVar('duration'))));
        $input = [
            'peminjam' => $userData['nama'],
            'labkom' => $this->request->getVar('labkom-opt'),
            'waktu_peminjaman' => date('Y-m-d h:i:s', time()),
            'waktu_penggunaan' => $waktu_pinjam,
            'waktu_akhir_penggunaan' => $waktu_selesai,
            'status' => 'unfinished',
            'catatan' => $this->request->getVar('reser-notes')
        ];
        $db = db_connect();
        $query = $db->query('SELECT * FROM reservasi_labkom WHERE (`labkom` = \'' . $this->request->getVar('labkom-opt') . '\' AND `status` = \'unfinished\') AND (`waktu_penggunaan` >= \'' . $waktu_pinjam . '\' OR `waktu_akhir_penggunaan` <= \'' . $waktu_selesai . '\')');
        print_r($query->getResult());
        if (count($query->getResult()) == 0) {
            $this->reservasi->save($input);
            $pesan = [
                'sukses' => 'Berhasil Reservasi'
            ];
        } else {
            $pesan = [
                'gagal' => 'Waktu anda bertabrakan dengan jadwal lain'
            ];
        }
        return $this->response->setJSON($pesan);
    }

    public function delete_reser($id)
    {
        $input = [
            'id' => $id,
            'status' => 'finished'
        ];
        $this->reservasi->save($input);
        $pesan = [
            'sukses' => 'Data Berhasil Dihapus'
        ];
        return $this->response->setJSON($pesan);
    }

    public function update_reser_modal($id)
    {
        if ($this->request->isAJAX()) {
            $data = [
                'item' => $this->reservasi->find($id)
            ];

            $result = [
                'data' => view('/template/reser_modal.php', $data)
            ];

            return $this->response->setJSON($result);
        } else {
            exit('data tidak dapat ditampilkan');
        }
    }

    public function update_reser($id)
    {
        $waktu_pinjam = $this->request->getVar('peminjaman') . " " . $this->request->getVar('jam');
        $waktu_pinjam = date('Y-m-d H:i:s', strtotime($waktu_pinjam));
        $waktu_selesai = date('Y-m-d H:i:s', strtotime($waktu_pinjam . sprintf(' + %u hour', $this->request->getVar('duration'))));
        $input = [
            'id' => $id,
            'labkom' => $this->request->getVar('labkom-opt'),
            'waktu_peminjaman' => date('Y-m-d h:i:s', time()),
            'waktu_penggunaan' => $waktu_pinjam,
            'waktu_akhir_penggunaan' => $waktu_selesai,
            'status' => 'unfinished',
            'catatan' => $this->request->getVar('reser-notes')
        ];
        $db = db_connect();
        $query = $db->query('SELECT * FROM reservasi_labkom WHERE (`labkom` = \'' . $this->request->getVar('labkom-opt') . '\' AND `status` = \'unfinished\') AND (`waktu_penggunaan` >= \'' . $waktu_pinjam . '\' OR `waktu_akhir_penggunaan` <= \'' . $waktu_selesai . '\')');
        if (count($query->getResult()) == 1) {
            $this->reservasi->save($input);
            $pesan = [
                'sukses' => 'Data berhasil diupdate'
            ];
        } else {
            $pesan = [
                'gagal' => 'Waktu anda bertabrakan dengan jadwal lain'
            ];
        }
        return $this->response->setJSON($pesan);
    }
}
