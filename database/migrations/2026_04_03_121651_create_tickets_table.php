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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('board_area_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->enum('priority_level', ['low', 'medium', 'high'])->default('medium');
            $table->enum('type', ['bug', 'feature', 'enhancment', 'task'])->default('task');
            $table->unsignedBigInteger('ticket_order')->default(0);
            $table->string('rank')->nullable()->index();
            $table->string('background_color')->nullable();
            $table->unsignedBigInteger('sprint_id')->nullable();
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
        Schema::dropIfExists('tickets');
    }
};
