<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cus_truck');
            $table->string('plate_num');
            $table->string('cus_vanqty');
            $table->string('cus_vannumber');
            $table->string('cus_name');
            $table->string('cus_destination');
            $table->string('cus_description');
            $table->decimal('cus_amount', 9,2);
            $table->Integer('hours')->default(0);
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
        Schema::dropIfExists('customers');
    }
}
