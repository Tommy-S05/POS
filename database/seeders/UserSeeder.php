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
        $user1 = User::create([
            'name' => 'Tommy Rafael Sanchez Feliz',
            'email' => 'tommy-s05@hotmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Super-Admin');
    }
}
