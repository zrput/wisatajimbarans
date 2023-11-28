<?php
namespace App\Models;

use CodeIgniter\model;

class Makomodasi extends Model{

    protected $table = 'akomodasi_penginapan';
    protected $primaryKey = 'id_penginapan';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_penginapan','tipe_penginapan', 'alamat', 'jam_operasi', 'email','telepon', 
    'peta', 'deskripsi'];

    public function insert_data($data){
        return $this->insert($data);
    }

    public function get_id(){
        return $this->select('id_penginapan')->orderBy('id_penginapan', 'desc')->first();
    }

    public function insert_img($data){
        return $this->db->table('gambar_akomodasi')->insert($data);
    }

    public function get_nama_img($id){
        return $this->db->table('gambar_akomodasi')->select('gambar_akomodasi')->where('id_penginapan', $id)->get()->getResultArray();
    }

    // fitur edit
    public function get_data_img($id){
        return $this->db->table('gambar_akomodasi')->where('id_penginapan', $id)->get()->getResult();
        
    }

    public function get_nama_edit($id){ // function untuk menghapus 1 gambar pada menu edit 
        return $this->db->table('gambar_akomodasi')->select('gambar_akomodasi')->where('id_gambar', $id)->get()->getRow();
    }

    public function edit_delete($id){
        return $this->db->table('gambar_akomodasi')->where('id_gambar', $id)->delete();
    }

    public function update_data($id, $data){
        return $this->update($id, $data);
    }

    // fitur hapus
    public function delete_data($id){
        return $this->where('id_penginapan', $id)->delete();
    }

    public function delete_img($id){
        return $this->db->table('gambar_akomodasi')->where('id_penginapan', $id)->delete();
    }


}