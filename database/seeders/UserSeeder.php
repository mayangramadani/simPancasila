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
            'role' => 'admin'
        ]);
        User::create([
            'id' => '2',
            'name' => 'guru',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('123123123'),
            'role' => 'guru'
        ]);

        User::create([
            'id' => '3',
            'name' => 'Bambang',
            'email' => 'bambang@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

        User::create([
            'id' => '4',
            'name' => 'Menik',
            'email' => 'menik@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

        User::create([
            'id' => '5',
            'name' => 'Budi',
            'email' => 'budi@gmail.com',
            'password' => bcrypt('123123123'),
        ]);
    }
}
