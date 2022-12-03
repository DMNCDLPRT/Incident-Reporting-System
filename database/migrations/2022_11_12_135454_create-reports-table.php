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
            $table->string('teamid')->references('id')->on('teams'); // based on what department expept if it is SOS
            $table->string('reportType');
            $table->string('location'); // based on what portal the user connected with - each portal has different location
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
