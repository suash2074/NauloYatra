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
        Schema::create('news_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_id')->nullable();
            $table->string('sub_headline');
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('link');
            $table->enum('status',['Active', 'Inactive'])->default('Active');
            $table->foreign('news_id')->references('id')->on('news')->onDelete('set null');
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
        Schema::dropIfExists('news_details');
    }
};
