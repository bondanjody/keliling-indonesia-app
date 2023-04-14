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
            'title'=>'Keliling Indonesia',
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
            'title' => 'Tambah Data',
            'validation' => session()->get('validation')
        ];
        return view('wisata/tambah', $data);
    }

    public function save()
    {
        if(!$this->validate([
            'namatempat' => [
                'rules' => 'is_unique[tempatwisata.namatempat]',
                'errors' => [
                    'is_unique' => '{field} sudah terdaftar.'
                ]
                ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar melebihi batas',
                    'is_image' => 'Yang anda inputkan bukan gambar',
                    'mime_in' => 'Yang anda inputkan bukan gambar',
                ]
            ]
        ])){
            $validation = \Config\Services::validation()->listErrors();
            return redirect()->to('/tambah')->withInput()->with('validation', $validation);
        }

        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');

        // Apabila tidak ada file yang di upload
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.jpg';
        } else {
            // Meng generate nama gambar random
            $namaGambar = $fileGambar->getRandomName();
    
            // memindahkan file gambar ke folder images
            $fileGambar->move('images', $namaGambar);
        }


        $slug = url_title($this->request->getVar('namatempat'), '-', true);

        $this->wisataModel->save([
            'namatempat' => $this->request->getVar('namatempat'),
            'gambar' => $namaGambar,
            'alamat' => $this->request->getVar('alamat'),
            'tentang' => $this->request->getVar('tentang'),
            'harga' => $this->request->getVar('harga'),
            'slug' => $slug,
            'provinsi' => $this->request->getVar('provinsi'),
        ]);

        session()->setFlashdata('pesan','Data berhasil ditambahkan !');

        return redirect()->to('/');
    }

    public function delete($id)
    {
        $this->wisataModel->delete($id);
        session()->setFlashdata('pesan','Data berhasil dihapus !');
        return redirect()->to('/');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Data',
            'validation' => session()->get('validation'),
            'wisata' => $this->wisataModel->getWisata($slug)
        ];

        return view('wisata/edit', $data);
    }

    public function update($id)
    {
        // Cek Nama tempat
        // $wisataLama = $this->wisataModel->getWisata($this->request->getVar());
        
        // echo "test2";

        if(!$this->validate([
            'namatempat' => [
                'rules' => 'is_unique[tempatwisata.namatempat]',
                'errors' => [
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation()->listErrors();
            return redirect()->to("wisata/edit/" . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $slug = url_title($this->request->getVar('namatempat'), '-', true);

        $this->wisataModel->save([
            'id' => $id,
            'namatempat' => $this->request->getVar('namatempat'),
            'gambar' => $this->request->getVar('gambar'),
            'alamat' => $this->request->getVar('alamat'),
            'tentang' => $this->request->getVar('tentang'),
            'harga' => $this->request->getVar('harga'),
            'slug' => $slug,
            'provinsi' => $this->request->getVar('provinsi'),
        ]);

        session()->setFlashdata('pesan','Data berhasil diubah !');

        return redirect()->to('/');
    }
}
