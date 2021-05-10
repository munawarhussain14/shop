<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->string("flavor")->nullable();
            $table->decimal("size",8,2);
            $table->decimal("case_size",8,2)->nullable();
            $table->unsignedBigInteger("measure_unit_id");
            $table->integer("qty");
            $table->decimal("price",8,2);
            $table->decimal("sales_price",8,2);
            $table->decimal("special_price",8,2);
            $table->dateTime("special_price_from")->nullable();
            $table->dateTime("special_price_to")->nullable();
            $table->boolean("inStock")->default(0);
            $table->enum("grocery_type",['vegetable','non-vegetable'])->default("non-vegetable");
            $table->date("price_date")->nullable();
            $table->text("image_url")->nullable();
            $table->dateTime("available_from")->nullable();
            $table->dateTime("available_to")->nullable();
            $table->unsignedBigInteger("brand_id")->nullable();
            $table->unsignedBigInteger("cat_id")->nullable();
            $table->unsignedBigInteger("store_id")->nullable();
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
        Schema::dropIfExists('product');
    }
}
