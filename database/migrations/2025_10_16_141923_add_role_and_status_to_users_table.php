<?php
// database/migrations/2024_01_01_000001_add_role_and_status_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'guru'])->default('guru');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('sekolah')->nullable();
            $table->string('nip')->nullable();
            $table->text('alasan_penolakan')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'status', 'sekolah', 'nip', 'alasan_penolakan']);
        });
    }
};