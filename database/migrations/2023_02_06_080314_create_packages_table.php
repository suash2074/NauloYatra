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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            //ID, user-id, trek_id, status
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('trek_id')->nullable();
            $table->string('package_name');
            $table->enum('status',['Active', 'Inactive'])->default('Active');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('trek_id')->references('id')->on('treks')->onDelete('set null');
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
        Schema::dropIfExists('packages');
    }
};
