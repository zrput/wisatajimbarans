<?php
namespace App\Models;

use CodeIgniter\model;

class Mfasilitas extends Model{

    protected $table = 'fasilitas';
    protected $primaryKey = 'id_fasilitas';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_fasilitas','deskripsi', 'harga_fasilitas', 'jenis_fasilitas'];
}