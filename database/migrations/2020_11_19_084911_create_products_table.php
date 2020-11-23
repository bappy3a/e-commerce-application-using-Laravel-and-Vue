<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('name');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('thumbnail_img');
            $table->string('photos');
            $table->double('unit_price', 8, 2)->default(0.00);
            $table->string('published');
            $table->string('featured');
            $table->integer('discount');
            $table->integer('current_stock')->default(0);
            $table->double('shipping_cost', 8, 2)->default(0.00);
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
}
