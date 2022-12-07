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
            
            $table->string('userId')->references('id')->users();

            $table->foreignId('report_id');

            $table->foreignId('location_id');

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
