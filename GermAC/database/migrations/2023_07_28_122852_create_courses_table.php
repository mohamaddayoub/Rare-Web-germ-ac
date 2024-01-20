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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade')->onUpdate('cascade');
            // $table->unsignedBigInteger('doctor_id')->nullable();
            // $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('set null');
            $table->string('name');
            $table->text('description');
            $table->integer('price')->nullable();
            $table->string('currency')->nullable();
            $table->date('date');
            $table->time('time');
            $table->integer('rate')->nullable()->default('3');
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
        Schema::dropIfExists('courses');
    }
};
