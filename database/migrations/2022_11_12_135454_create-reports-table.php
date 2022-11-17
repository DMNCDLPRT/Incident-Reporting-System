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

            $table->string('reportType');
            $table->string('teamid')->references('id')->on('teams'); // based on what department expept if it is SOS
            $table->string('location')->references('location')->on('portal'); // based on what portal the user connected with - each portal has different location
            $table->string('specificLocation');
            $table->string('status');

            $table->dateTime(Reports::CREATED_AT);
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
