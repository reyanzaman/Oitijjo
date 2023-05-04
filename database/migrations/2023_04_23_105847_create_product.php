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
        Schema::create('seller', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('contact');
            $table->timestamps();
        });
        
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price');
            $table->text('description');
            $table->unsignedBigInteger('seller_id');
            $table->decimal('length');
            $table->decimal('width');
            $table->decimal('height');
            $table->integer('stock');
            $table->string('model');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('seller')->onDelete('cascade');
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