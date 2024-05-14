<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DosenModel;
use App\Models\CustomerModel;
use CodeIgniter\HTTP\ResponseInterface;

class Dosen extends BaseController
{
    protected $dosenModel;
    public function __construct()
    {
        $this->dosenModel = new DosenModel();
    }
    public function index()
    {
        $data = [
            'active' => 'Dosen',
            'judul' => 'Master Data',
            'subtitle' => 'Dosen',
            'dosen' => $this->dosenModel->findAll(),
        ];
        return view('dosen', $data);
    }

    public function insertData()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'mata_kuliah' => $this->request->getPost('mata_kuliah'),
            'email' => $this->request->getPost('email')
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        $this->dosenModel->insertData($data);
        return redirect()->to('dosen');
    }

    public function updateData($id_dosen)
    {
        $data = [
            'id_dosen' => $id_dosen,
            'nama' => $this->request->getPost('nama'),
            'mata_kuliah' => $this->request->getPost('mata_kuliah'),
            'email' => $this->request->getPost('email')
        ];
        
        $this->dosenModel->updateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!!');
        return redirect()->to('dosen');
    }

    public function deleteData($id_dosen)
    {
        $data = [
            'id_dosen' => $id_dosen
        ];
        
        $this->dosenModel->deleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to('dosen');
    }
}
