<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            ['name' => 'admin', 'level' => 'admin','username'=>'admin', 'password' => bcrypt('123456')],
            ['name' => 'gudang', 'level' => 'gudang','username'=>'gudang', 'password' => bcrypt('123456')],
            ['name' => 'pemilik', 'level' => 'pemilik','username'=>'pemilik', 'password' => bcrypt('123456')],
        ];

        foreach ($user as $users) {
            User::create($users);
        }
    }
}
