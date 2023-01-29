<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trek_id')->nullable();
            $table->unsignedBigInteger('gallery_detail_id')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->foreign('trek_id')->references('id')->on('treks')->onDelete('set null');
            $table->foreign('gallery_detail_id')->references('id')->on('gallery_details')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
};
