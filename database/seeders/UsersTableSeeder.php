<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('12345678'),
            'level_id' => '1'
        ]);

        // User::create([
        //     'name' => 'Instruktur',
        //     'email' => 'instruktur@email.com',
        //     'password' => bcrypt('12345678'),
        //     'level' => 'instruktur'
        // ]);
    }
}
