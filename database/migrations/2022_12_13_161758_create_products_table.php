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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('username');
            $table->string('password');
            $table->string('value_account');
            $table->string('bp_available');
            $table->bigInteger('price');
            $table->tinyInteger('sale_percent')->nullable();
            $table->bigInteger('price_after_sale');
            $table->integer('category_id');
            $table->tinyInteger('status')->default(0)->comment('0 - not sold yet, 1 - sold');
            $table->date('sold_date')->nullable();
            $table->boolean('linked_phone')->nullable();
            $table->boolean('linked_email')->nullable();
            $table->string('more')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
};
