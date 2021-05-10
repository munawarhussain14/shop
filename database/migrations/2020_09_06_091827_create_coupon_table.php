<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("term_condition");
            $table->decimal("min_buy",8,2);
            $table->date("expire_date");
            $table->date("expire_date");
            $table->integer("no_of_uses");
            $table->string("code");
            $table->integer("value");
            $table->integer("value");
            $table->integer("type");
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
        Schema::dropIfExists('coupon');
    }
}
