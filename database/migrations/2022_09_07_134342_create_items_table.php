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
        Schema::create('timers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tracker_id');
            $table->foreign('tracker_id')->references('id')->on('trackers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->text('notes')->nullable();
            $table->dateTime('start');
            $table->dateTime('end')->nullable();
            $table->integer('duration')->default(0);
            $table->boolean('edited')->default(false);
            $table->boolean('deleted')->default(false);
            $table->boolean('manual')->default(false);
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
        Schema::dropIfExists('timers');
    }
};
