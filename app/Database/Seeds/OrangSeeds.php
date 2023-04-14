<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class OrangSeeds extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Lionel Jody',
                'alamat'    => 'Jl. Arjuna, Bulukerto',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama' => 'Alexander Jody',
                'alamat'    => 'Jl. Werkudara, Bulukerto',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama' => 'Hector Jody',
                'alamat'    => 'Jl. Nakula, Bulukerto',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ]
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)', $data);

        // Using Query Builder
        $this->db->table('orang')->insertBatch($data);
    }
}