<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Hanya panggil AdminUserSeeder saja
        $this->call([
            DatabaseSeeder::class,
        ]);
    }
}