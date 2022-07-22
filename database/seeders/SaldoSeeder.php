<?php

namespace Database\Seeders;

use App\Models\Saldo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaldoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Saldo::create([
            // 'sekolah_id' => '',
            'debit' => '120000',
            'kredit' => '210000',
            'saldo' => '10000'
        ]);
    }
}
