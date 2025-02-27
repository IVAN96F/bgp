<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'role_id')) { // Cek apakah kolom ada
                $table->dropColumn('role_id'); // Hapus kolom role_id
            }
        });
    }

    public function down() {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->default(2)->constrained('roles')->onDelete('cascade');
        });
    }
};
