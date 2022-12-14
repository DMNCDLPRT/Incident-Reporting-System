<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigns', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('departments_id')->nullable();

            $table->unsignedBigInteger('incidents_id')->index();
            $table->foreign('incidents_id')
                ->references('id')
                ->on('report_types')
                ->onDelete('cascade');

            $table->unsignedBigInteger('department_id')->index();
            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');

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
        Schema::dropIfExists('assigns');
    }
};
