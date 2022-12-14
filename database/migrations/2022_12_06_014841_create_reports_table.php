<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Reports;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedInteger('userId')->references('id')->users();
            
            $table->unsignedBigInteger('report_id')->index();
            $table->foreign('report_id')
                ->references('id')
                ->on('report_types')
                ->onDelete('cascade');

            $table->unsignedBigInteger('location_id')->index();
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');

            $table->string('specificLocation');
            $table->string('files')->nullable();
            $table->string('status')->default('active');

            $table->dateTime(Reports::CREATED_ON);
            $table->dateTime(Reports::UPDATED_ON);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
