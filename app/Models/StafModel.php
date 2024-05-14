<?php

namespace App\Models;

use CodeIgniter\Model;

class StafModel extends Model
{
    protected $table = 'staf_kampus';

    protected $primaryKey = 'id_staf';
    
    protected $allowedFields = ['nama', 'posisi', 'email'];

    public function insertData($data)
    {
        $this->db->table('staf_kampus')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('staf_kampus')->where('id_staf', $data['id_staf'])->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('staf_kampus')->where('id_staf', $data['id_staf'])->delete($data);
    }
}
