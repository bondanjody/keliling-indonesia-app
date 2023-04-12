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

        // Jika data tidak ada 
        if(empty($data['wisata'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Wisata'.$slug. ' tidak ditemukan');
        }

        return view('wisata/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title'=>'Tambah Data',
        ];
        return view('wisata/tambah', $data);
    }

    public function save()
    {
        $slug = url_title($this->request->getVar('namatempat'), '-', true);

        $this->wisataModel->save([
            'namatempat' => $this->request->getVar('namatempat'),
            'gambar' => $this->request->getVar('gambar'),
            'alamat' => $this->request->getVar('alamat'),
            'tentang' => $this->request->getVar('tentang'),
            'harga' => $this->request->getVar('harga'),
            'slug' => $slug,
            'provinsi' => $this->request->getVar('provinsi'),
        ]);

        session()->setFlashdata('pesan','Data berhasil ditambahkan !');

        return redirect()->to('/');
    }
}
