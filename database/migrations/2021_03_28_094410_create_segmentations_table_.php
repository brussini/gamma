<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSegmentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('segmentations', function (Blueprint $table) {
            $table->id();
            $table->string('br', 100)->nullable();
            $table->string('gl_code', 100)->nullable();
            $table->string('ccy_code', 100)->nullable();
            $table->string('cust_ac_no', 100)->nullable();
            $table->string('cust_no', 100)->nullable();
            $table->longText('ac_desc')->nullable();
            $table->string('account_class', 100)->nullable();
            $table->string('cust_mis_1', 100)->nullable();
            $table->string('cust_mis_2', 100)->nullable();
            $table->string('comp_mis_4', 100)->nullable();
            $table->string('cust_mis_7', 100)->nullable();
            $table->double('solde', 15, 2)->nullable();
            $table->string('bu', 100)->nullable();
            $table->string('segment', 100)->nullable();
            $table->string('type', 100)->nullable();
            $table->foreign('cust_ac_no')->references('cust_ac_no')->on('dormants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cust_no')->references('client_id')->on('digital_products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('comp_mis_4')->references('mis_code')->on('business_units')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('segmentations');
    }
}
