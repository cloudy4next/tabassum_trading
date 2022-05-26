<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmazonPoroductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amazon_poroducts', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('product')->nullable();
            $table->string('original_price')->nullable();
            $table->string('supplier')->nullable();
            $table->string('suplier_price')->nullable();
            // $table->string('roi');
            $table->string('margin')->nullable();
            $table->string('profit')->nullable();
            $table->string('card_name')->nullable();
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
        Schema::dropIfExists('amazon_poroducts');
    }
}
