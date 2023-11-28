<?php

namespace App\Controllers;

class Fasilitas extends BaseController
{

    
    public function __construct()
    {
        $this->fasilitas_model = new \App\Models\Mfasilitas();
    }

    public function table_fasilitas($id){
        $hasil = $this->fasilitas_model->find($id);
        if ($hasil != null) {
            $data['data'] = $result->result_array();
        }else{
             // Handle the case where the result is null
            $data['data'] = array();
        }
        $data['pk'] = $id;
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/fasilitas/table_fasilitas', $data);

    }

    public function form_fasilitas(){
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/fasilitas/form_fasilitas', $data);
    }

    public function insert_fasilitas(){
        $nama = $this->request->getPost('nama');
        $tipe = $this->request->getPost('tipe');
        $tipe = $this->request->getPost('harga');
        $des = $this->request->getPost('des');

        $files = $this->request->getFiles('img[]');

        $in_data = [
            'nama_penginapan' => $nama,
            'tipe_penginapan' => $tipe,
            'alamat' => $alamat,
            'jam_operasi' => $jam,
            'email' => $email,
            'telepon' => $nomor,
            'peta' => $peta,
            'deskripsi' => $des,
        ];

        $this->akomodasi_model->insert_data($in_data);
        
        $id_ob = $this->akomodasi_model->get_id()->id_penginapan;
        
        if ($files) {
            $allowedMimeTypes = ['image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            foreach ($files['img'] as $key => $imgs) {
                if ($imgs->isValid() &&
                in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)) {
                    $in_img = [
                        'gambar_akomodasi' => $imgs->getClientName(),
                        'id_penginapan' => $id_ob,
                    ];
                    $this->akomodasi_model->insert_img($in_img);
                    $imgs->move(ROOTPATH . 'public/akomodasi_penginapan', $imgs->getClientName());
                }
                
            }
        }
        return redirect()->to(base_url('Akomodasi/table_akomodasi'));

    }
    
    
}
