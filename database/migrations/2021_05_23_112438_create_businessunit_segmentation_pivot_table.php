<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessunitSegmentationPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_seg', function (Blueprint $table) {
            $table->unsignedBigInteger('businessunit_id')->index();
            $table->foreign('businessunit_id')->references('id')->on('businessunit')->onDelete('cascade');
            $table->unsignedBigInteger('segmentation_id')->index();
            $table->foreign('segmentation_id')->references('id')->on('segmentation')->onDelete('cascade');
            $table->primary(['businessunit_id', 'segmentation_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businessunit_segmentation');
    }
}
