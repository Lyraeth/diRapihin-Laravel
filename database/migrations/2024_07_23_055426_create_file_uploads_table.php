<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('file_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->string('filename');
            $table->string('original_filename');
            $table->unsignedBigInteger('file_size');
            $table->string('filename_pedoman')->nullable();
            $table->string('original_filename_pedoman')->nullable();
            $table->unsignedBigInteger('file_size_pedoman')->nullable();
            $table->string('status');
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_uploads');
    }
};
