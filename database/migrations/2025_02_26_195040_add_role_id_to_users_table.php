<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'role_id')) { // Pastikan kolom belum ada
                $table->foreignId('role_id')
                    ->default(2) // Default ke 'user'
                    ->after('password') // Letakkan setelah 'password'
                    ->constrained('roles') // Hubungkan dengan tabel 'roles'
                    ->onDelete('cascade'); // Hapus jika role dihapus
            }
        });
    }

    public function down() {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'role_id')) {
                $table->dropForeign(['role_id']);
                $table->dropColumn('role_id');
            }
        });
    }
};
