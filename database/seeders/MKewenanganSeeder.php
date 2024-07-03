<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MKewenanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 100,   'ket_kewenangan' => 'Super Admin'],
            ['id' => 200,   'ket_kewenangan' => 'User'],
        ];
        DB::table('m_kewenangan')->insert($data);
    }
}
