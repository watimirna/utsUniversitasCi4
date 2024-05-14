<?php

namespace App\Controllers;

use App\Models\StafModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Staf extends BaseController
{
    protected $stafModel;
    public function __construct()
    {
        $this->stafModel = new StafModel();
    }
    public function index()
    {
        $data = [
            'active' => 'Staf Kampus',
            'judul' => 'Master Data',
            'subtitle' => 'Staf',
            'staf_kampus' => $this->stafModel->findAll()
        ];
        return view('staf', $data);
    }

    public function insertData()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'posisi' => $this->request->getPost('posisi'),
            'email' => $this->request->getPost('email')
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        $this->stafModel->insertData($data);
        return redirect()->to('staf');
    }

    public function updateData($id_staf)
    {
        $data = [
            'id_staf' => $id_staf,
            'nama' => $this->request->getPost('nama'),
            'posisi' => $this->request->getPost('posisi'),
            'email' => $this->request->getPost('email')
        ];
        
        $this->stafModel->updateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!!');
        return redirect()->to('staf');
    }

    public function deleteData($id_staf)
    {
        $data = [
            'id_staf' => $id_staf
        ];
        
        $this->stafModel->deleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to('staf');
    }
}
