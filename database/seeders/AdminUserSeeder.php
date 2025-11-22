<?php
// database/seeders/AdminUserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Hapus user default Laravel jika ada
        User::where('email', 'test@example.com')->delete();

        // Buat user admin
        $adminExists = User::where('email', 'admin@sekolah.com')->exists();
        
        if (!$adminExists) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@sekolah.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'status' => 'approved',
                'sekolah' => 'Sekolah Utama',
                'nip' => '000000000000'
            ]);
            $this->command->info('Admin user created successfully!');
        }

        // Buat user guru contoh
        $guruExists = User::where('email', 'guru@sekolah.com')->exists();
        
        if (!$guruExists) {
            User::create([
                'name' => 'Guru Contoh',
                'email' => 'guru@sekolah.com',
                'password' => Hash::make('password123'),
                'role' => 'guru',
                'status' => 'approved',
                'sekolah' => 'Sekolah Utama',
                'nip' => '123456789012'
            ]);
            $this->command->info('Contoh guru user created successfully!');
        }
    }
}