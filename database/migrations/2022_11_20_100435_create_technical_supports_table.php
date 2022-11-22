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
        Schema::create('technical_supports', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->longText('content')->nullable();
            $table->enum('type',['complaint','enquiry','suggestion'])->default('enquiry');
            $table->enum('status',['finished','not_finished','pending'])->default('pending');
            $table->boolean('is_deleted')->default(0);
            $table->unsignedBigInteger('activity_id')->nullable();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->unsignedBigInteger('store_id')->nullable();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
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
        Schema::dropIfExists('technical_supports');
    }
};
