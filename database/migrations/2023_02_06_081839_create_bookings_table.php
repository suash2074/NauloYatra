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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('guide_name')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->string('email');
            $table->integer('number_of_people');
            $table->date('arrival_date');
            $table->integer('contact_number');

            $table->integer('days');
            $table->unsignedBigInteger('trek_id')->nullable();
            $table->enum('status',['Active', 'Inactive'])->default('Active');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('trek_id')->references('id')->on('treks')->onDelete('set null');
            $table->foreign('package_id')->references('id')->on('package_details')->onDelete('set null');
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
        Schema::dropIfExists('bookings');
    }
};
