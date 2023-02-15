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
            
            $table->unsignedBigInteger('userId')->index()->nullable();
            $table->foreign('userId')->references('id')->on('users');
            
            $table->unsignedBigInteger('report_id')->index();
            $table->foreign('report_id')
                ->references('id')
                ->on('report_types')
                ->onDelete('cascade');
            
            $table->mediumText('files')->nullable();
            $table->string('status')->default('processing');

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
