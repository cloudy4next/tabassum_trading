<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrammenphoneProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grammenphone_products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->float('distributor_price')->nullable();
            $table->float('retail_price')->nullable();
            $table->float('upfront')->nullable();

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grammenphone_products');
    }
}
