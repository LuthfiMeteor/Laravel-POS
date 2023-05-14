<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Setting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting')->insert([
            'id_setting' => 1,
            'nama_perusahaan' => 'HARNOKO POS',
            'alamat' => 'Cikambuy Tengah',
            'telepon' => '0895703157598',
            'tipe_nota' => 1, // kecil
            'diskon' => 0,
            'path_logo' => '/img/logo.png',
            'path_kartu_member' => '/img/member.jpg',
        ]);
    }
}
