<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'admin@gmail.com'
        ], [
            'name' => 'Admin',
            'password' => bcrypt('admin@123'),
            'role' => 'admin',
        ]);
    
        User::firstOrCreate([
            'email' => 'admin2@gmail.com'
        ], [
            'name' => 'Admin2',
            'password' => bcrypt('admin@1234'),
            'role' => 'admin',
        ]);
    
        User::firstOrCreate([
            'email' => 'admin3@gmail.com'
        ], [
            'name' => 'Admin3',
            'password' => bcrypt('admin@1235'),
            'role' => 'admin',
        ]);
    }
    
}
