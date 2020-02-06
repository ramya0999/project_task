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
            $table->bigIncrements('id');
            $table->string('lot_title');
            $table->string('category_name');
            $table->string('skucode');
            $table->string('barcode');
            $table->integer('serial_number');
            $table->string('lot_number');
            $table->string('lot_location');
            $table->longText('description');
            $table->decimal('price',6,2); // max 6 digits and 2 of it is decimal point place
            $table->string('lot_condition'); // for both foreign heat and celsius, its decimal is (4,1)
            $table->decimal('pre_tax_amount',6,2);
            $table->string('tax_name');
            $table->decimal('tax_amount',6,2);
            $table->string('warehouse_name');
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
