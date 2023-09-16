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
        Schema::create('juals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_sampah_id'); // Foreign key to jenis_sampahs table
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->decimal('berat_sampah', 10, 2); // Adjust the precision and scale as needed
            $table->decimal('total_harga', 10, 2); // Adjust the precision and scale as needed
            $table->string('gambar'); // Assuming you store the file path, adjust as needed
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juals');
    }
};
