<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,     
            SaldoSeeder::class,
            KategoriKeuanganSeeder::class,
            KeuanganSeeder::class,
            SekolahSeeder::class,
            TingkatanKelasSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class,
            AksesKelasSeeder::class,

           
        ]);
    }
}
