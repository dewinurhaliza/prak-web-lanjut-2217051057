<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user', function (Blueprint $table) {
            // Hapus kolom npm
            $table->dropColumn('npm');

            // Tambah kolom baru
            $table->enum('jurusan', ['Fisika', 'Kimia', 'Biologi', 'Matematika', 'Ilmu Komputer'])->after('foto');
            $table->integer('semester')->unsigned()->default(1)->after('jurusan')->max(14);
            $table->foreignId('fakultas_id')->constrained()->after('semester');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table){
            $table->string('npm');
            $table->dropColumn(['jurusan', 'semester', 'fakultas_id']);
        });
    }
};
