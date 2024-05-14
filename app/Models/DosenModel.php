<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table = 'dosen';

    protected $primaryKey = 'id_dosen';
    
    protected $allowedFields = ['nama', 'mata_kuliah', 'email'];

    public function insertData($data)
    {
        $this->db->table('dosen')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('dosen')->where('id_dosen', $data['id_dosen'])->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('dosen')->where('id_dosen', $data['id_dosen'])->delete($data);
    }
}
