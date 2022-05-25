<?php

namespace App\Controllers;

use App\Models\Member;

class User extends BaseController
{
    protected $memberModel;
    public function __construct()
    {
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
            $input = [
                'nama' => $nama,
                'email' => $this->request->getVar('email'),
                'password' => hash('sha256', $this->request->getVar('password')),
                'telepon' => $this->request->getVar('telepon'),
                'alamat' => $this->request->getVar('alamat'),
                'avatar' => $namaAvatar
            ];

            $this->memberModel->save($input);
            $pesan = [
                'sukses' => "Silahkan konfirmasi email terlebih dahulu sebelum login"
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
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'status' => $data['status'],
                    'avatar' => $data['avatar'],
                    'logged_in' => TRUE
                ]);
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

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    public function detail($id){
        $data = [
            'item' => $this->memberModel->find($id)
        ];

        return view('user/profil', $data);
    }
}
