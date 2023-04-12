<?php

namespace App\Controllers;
use App\Models\WisataModel;

class Home extends BaseController
{
    protected $wisataModel;

    public function __construct()
    {
        $this->wisataModel = new WisataModel();
    }

    public function index()
    {
        $data = [
            'title'=>'Daftar Komik',
            'wisata' => $this->wisataModel->getWisata()
        ];
        return view('wisata/home', $data);
    }

    public function detail($slug)
    {
        $detailData = $this->wisataModel->getWisata($slug);
        $data = [
            'title' => $detailData['namatempat'],
            'wisata' => $detailData
        ];
        return view('wisata/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title'=>'Tambah Data',
        ];
        return view('wisata/tambah', $data);
    }
}
