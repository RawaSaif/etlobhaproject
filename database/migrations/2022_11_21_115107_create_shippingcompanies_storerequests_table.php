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
        Schema::create('shippingcompanies_storerequests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shippingcompany_id')->unsigned();
            $table->foreign('shippingcompany_id')->references('id')->on('shippingcompanies')->onDelete('cascade');
            $table->bigInteger('storerequest_id')->unsigned();
            $table->foreign('storerequest_id')->references('id')->on('storerequests')->onDelete('cascade');

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
        Schema::dropIfExists('shippingcompanies_storerequests');
    }
};
