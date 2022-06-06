<?php

namespace App\Controllers;

use App\Models\Member;
use Config\Cookie;
use DateTime;

class User extends BaseController
{
    protected $memberModel;
    public function __construct()
    {
        helper('cookie');
        $this->memberModel = new Member();
    }
    public function login()
    {
        return view('/user/sign-in.php');
    }

    public function daftar()
    {
        return view('/user/sign-up.php');
    }

    public function insertAjax()
    {
        $validator = \Config\Services::validation();
        $valid = $this->validate([
            'namadepan' => [
                'label' => 'Nama Depan',
                'rules' => 'required',
                'errors' => ['required' => "{field} wajib diisi"]
            ],

            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[member.email]',
                'errors' => ['required' => '{field} wajib diisi', 'is_unique' => '{field} sudah didaftarkan']
            ],

            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => ['required' => '{field} wajib diisi', 'min_length' => '{field} minimal 8 karakter']
            ],

            'password2' => [
                'label' => 'Password',
                'rules' => 'matches[password]',
                'errors' => ['matches' => 'Harus sama dengan {field}']
            ],

            'telepon' => [
                'label' => 'No. Telp',
                'rules' => 'required|numeric',
                'errors' => ['required' => '{field} harus diisi', 'numeric' => '{field} hanya diisi dengan angka']
            ],

            'avatar' => [
                'label' => 'Gambar Profil',
                'rules' => 'mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,500]',
                'errors' => ['mime_in' => 'Format {field} hanya jpg, jpeg, atau png', 'max_size' => 'Ukuran {field} maksimal 500 kb']
            ]
        ]);
        if (!$valid) {
            $pesan = [
                'error' => [
                    'namadepan' => $validator->getError('namadepan'),
                    'email' => $validator->getError('email'),
                    'password' => $validator->getError('password'),
                    'password2' => $validator->getError('password2'),
                    'telepon' => $validator->getError('telepon'),
                    'avatar' => $validator->getError('avatar')
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
            if ($this->request->getFile('avatar')->getName() != '') {
                $avatar = $this->request->getFile('avatar');
                $namaAvatar = $avatar->getRandomName();
                $avatar->move(ROOTPATH . 'public/images/avatar', $namaAvatar);
            } else {
                $namaAvatar = 'default.jpg';
            }

            $status = str_contains($this->request->getVar('email'), "uns.ac.id") ? "member_uns" : "member";
            $input = [
                'nama' => $nama,
                'email' => $this->request->getVar('email'),
                'password' => hash('sha256', $this->request->getVar('password')),
                'telepon' => $this->request->getVar('telepon'),
                'alamat' => $this->request->getVar('alamat'),
                'status' => $status,
                'avatar' => $namaAvatar
            ];

            $this->memberModel->save($input);
            $pesan = [
                'sukses' => "Silahkan login dan tunggu proses verifikasi email dari admin"
            ];
            return $this->response->setJSON($pesan);
            //konfirmasi email
            //redirect ke dashboard
            //user login kembali
        }
    }

    public function auth()
    {
        $email = $this->request->getVar('email');
        $password = hash('sha256', $this->request->getVar('password'));

        $data = $this->memberModel->where('email', $email)->first();
        if ($data) {
            if ($data['password'] == $password) {
                session()->set([
                    'id' => $data['id'],
                    'status' => $data['status']
                ]);
                if ($this->request->getVar('check')) {
                    setcookie('logged_in', true, time() + 3600 * 24 * 365.25 * 1000, '/', '', true);
                    setcookie('verif', $data['verif'], time() + 3600 * 24 * 365.25 * 1000, "/", '', true);
                    setcookie('avatar', $data['avatar'], time() + 3600 * 24 * 365.25 * 1000, "/", '', true);
                } else {
                    setcookie('logged_in', true, 0, '/', '', true);
                    setcookie('verif', $data['verif'], 0, "/", '', true);
                    setcookie('avatar', $data['avatar'], 0, "/", '', true);
                }
                $pesan = [
                    'sukses' => 'Login Sukses'
                ];
            } else {
                $pesan = [
                    'gagal' => 'Password Salah'
                ];
            }
        } else {
            $pesan = [
                'gagal' => 'Email Belum Terdaftar'
            ];
        }
        return $this->response->setJSON($pesan);
    }

    public function logout_modal()
    {
        if ($this->request->isAJAX()) {
            $result = [
                'data' => view('/template/logout.php')
            ];

            return $this->response->setJSON($result);
        } else {
            exit('data tidak dapat ditampilkan');
        }
    }

    public function logout()
    {
        if ($this->request->isAJAX()) {
            session()->destroy();
            delete_cookie('logged_in');
            delete_cookie('avatar');
            delete_cookie('verif');
            $result = [
                'sukses' => "Berhasil keluar"
            ];
            return $this->response->setJSON($result);
        }
    }

    public function detail($id)
    {
        $data = [
            'item' => $this->memberModel->find($id)
        ];
        return view('user/profil', $data);
    }

    public function edit_modal($id)
    {
        if ($this->request->isAJAX()) {
            $data = [
                'item' => $this->memberModel->find($id)
            ];

            $result = [
                'data' => view('/user/edit.php', $data)
            ];

            return $this->response->setJSON($result);
        } else {
            exit('data tidak dapat ditampilkan');
        }
    }

    // Delete User
    public function delete($id)
    {
        if ($this->request->isAJAX()) {
            $this->memberModel->delete($id);
            $result = [
                'sukses' => 'Data Berhasil Dihapus'
            ];
            session()->destroy();
            delete_cookie('logged_in');
            delete_cookie('avatar');
            delete_cookie('status');
            return $this->response->setJSON($result);
        } else {
            exit("Data gagal dihapus");
        }
    }

    // Update User
    public function update($id)
    {
        $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');

        if ($this->request->getFile('avatar')->getFilename() !== "") {
            $avatar = $this->request->getFile('avatar');
            $namaAvatar = $avatar->getRandomName();
            $avatar->move(ROOTPATH . 'public/images/avatar', $namaAvatar);
        } else {
            $namaAvatar = $this->request->getVar('avalama');
        }   

        if ($this->request->getVar("password") !== null) {
            $password = hash('sha256', $this->request->getVar('password'));
        } else {
            $password = $this->request->getVar("passlama");
        }

        $status = str_contains($this->request->getVar('email'), "uns.ac.id") ? "member_uns" : "member";
        $input = [
            'id' => $id,
            'nama' => $nama,
            'email' => $this->request->getVar('email'),
            'password' => $password,
            'telepon' => $this->request->getVar('telepon'),
            'alamat' => $this->request->getVar('alamat'),
            'status' => $status,
            'avatar' => $namaAvatar
        ];

        $this->memberModel->save($input);
        $pesan = [
            'sukses' => "Data telah diupdate"
        ];
        return $this->response->setJSON($pesan);
    }

    public function notVerif(){
        if($this->request->isAJAX()){
            $result = [
                "list" => $this->memberModel->where('verif', 0)->findAll()
            ];
            $hasil = [
                'data' => view('admin/list', $result)
            ];
            return $this->response->setJSON($hasil);
        }else{
            exit("Data tidak dapat ditampilkan");
        }
    }
}
