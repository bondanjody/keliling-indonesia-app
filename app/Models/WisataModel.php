<?php

namespace App\Models;

use CodeIgniter\Model;

class WisataModel extends Model
{
    protected $table = 'tempatwisata';

    protected $useTimestamps = true;

    protected $allowedFields = ['namatempat', 'alamat', 'provinsi', 'slug', 'gambar', 'tentang', 'harga'];

    public function getWisata($slug = false)
    {
        if ($slug == false) 
        {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}

?>