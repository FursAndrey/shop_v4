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
        Schema::create('ordered_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('sku_id');
            $table->string('name_ru');
            $table->string('name_en');
            $table->unsignedInteger('count')->default(0);
            $table->float('price_for_once')->default(0);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordered_products', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropIndex('ordered_products_order_id_foreign');
        });
        Schema::dropIfExists('ordered_products');
    }
};
