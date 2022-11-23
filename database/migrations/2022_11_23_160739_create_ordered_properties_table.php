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
        Schema::create('ordered_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ordered_product_id');
            $table->string('property_name_ru');
            $table->string('property_name_en');
            $table->string('option_name_ru');
            $table->string('option_name_en');
            $table->timestamps();
            $table->foreign('ordered_product_id')->references('id')->on('ordered_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordered_properties', function (Blueprint $table) {
            $table->dropForeign(['ordered_product_id']);
            $table->dropIndex('ordered_properties_ordered_product_id_foreign');
        });
        Schema::dropIfExists('ordered_properties');
    }
};
