<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            User::create([
                'id' => '1',
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123123123'),
            ]); 
    
            User::create([
                'id' => '2',
                'name' => 'siswa',
                'email' => 'siswa@gmail.com',
                'password' => bcrypt('123123123'),
            ]); 

            User::create([
                'id' => '3',
                'name' => 'siswa2',
                'email' => 'siswa2@gmail.com',
                'password' => bcrypt('123123123'),
            ]); 

            User::create([
                'id' => '4',
                'name' => 'siswa3',
                'email' => 'siswa3@gmail.com',
                'password' => bcrypt('123123123'),
            ]); 
    }
}
