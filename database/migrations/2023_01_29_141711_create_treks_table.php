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
        Schema::create('treks', function (Blueprint $table) {
            $table->id();
            $table->string('trek_name');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('background_image')->nullable();
            $table->enum('trek_type', ['Tea-House-Trek', 'Camping-Trekking', 'Gap-Trek']);
            $table->integer('duration')->nullable();
            $table->enum('track_difficulty',['Easy', 'Moderate', 'Difficult']);
            $table->integer('average_budget');
            $table->enum('best_season',['Spring', 'Summer', 'Autumn', 'Winter']);
            $table->enum('status',['Active', 'Inactive'])->default('Active');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('treks');
    }
};
