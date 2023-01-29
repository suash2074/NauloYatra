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
        Schema::create('health_kits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trek_id')->nullable();
            $table->unsignedBigInteger('medicine_id')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->foreign('trek_id')->references('id')->on('treks')->onDelete('set null');
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('set null');
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
        Schema::dropIfExists('health_kits');
    }
};
