<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDormantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dormants', function (Blueprint $table) {
            $table->id();
            $table->string('branch_code', 100)->nullable();
            $table->string('cust_ac_no', 100)->nullable();
            $table->string('ac_desc', 100)->nullable();
            $table->string('cif', 100)->nullable();
            $table->string('ac_stat_dormant', 100)->nullable();
            $table->string('eti_bus_seg', 100)->nullable();
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
        Schema::dropIfExists('dormants');
    }
}
