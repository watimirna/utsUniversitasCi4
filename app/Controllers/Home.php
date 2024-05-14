<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{

    public function index(): string
    {
        $data = [
            'active' => 'dashboard',
            'judul' => 'Dashboard',
            'subtitle' => 'Dashboard',
        ];
        return view('dashboard', $data);
    }
}
