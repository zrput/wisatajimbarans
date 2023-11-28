<?php

namespace App\Controllers;

class Auth extends BaseController
{
    
    public function __construct()
    {
        helper('form');
        $this->Madmin = new \App\Models\Madmin();
    }

    public function index()
    {
        return view('coba');
    }

    public function cek_login(){

        if($this->validate([
            'email' => [
                'label' => 'email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong Dan Wajib di isi !!'
                    ]
                ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong Dan Wajib di isi !!'
                    ]
                ]
        ])) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            $cek = $this->Madmin->login($email, $password);
            if ($cek) {
                session()->set('log', true);
                session()->set('username', $cek['username']);
                session()->set('email', $cek['email']);

                return redirect()->to(base_url('Admin/dashboard'));
            } else{
                session()->setFlashdata('pesan', 'Login Gagal ::, Username atau Password salah !!');
                return redirect()->to(base_url('Auth'));
            }

        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth'));
        }
    }

    public function logout(){
        session()->remove('log');
        session()->remove('username');
        session()->remove('email');

        session()->setFlashdata('pesan', 'Logout Berhasil....!');
        return redirect()->to(base_url('Auth'));
    }



    
}