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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price');
            $table->text('description');
<<<<<<< HEAD
            $table->decimal('diameter');
            $table->decimal('height');
            $table->decimal('width');
=======
            $table->decimal('length');
            $table->decimal('width');
            $table->decimal('height');
>>>>>>> 412e8cd (item backend)
            $table->boolean('stock');
            $table->string('model');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
