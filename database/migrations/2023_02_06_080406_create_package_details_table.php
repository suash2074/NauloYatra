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
        Schema::create('package_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->enum('trek_type', ['Tea House Trek', 'Camping Trekking', 'Gap Trek']);
            $table->integer('days');
            $table->integer('price_per_person');
            $table->text('details');
            $table->string('link');
            $table->enum('category', ['Basic', 'Standard']);
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('set null');
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
        Schema::dropIfExists('package_details');
    }
};
