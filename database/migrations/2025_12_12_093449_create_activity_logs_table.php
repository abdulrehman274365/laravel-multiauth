<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('workspace_id')->nullable();
            $table->string('model');
            $table->string('function');
            $table->string('user_log');
            $table->string('owner_log');
            $table->string('general_log');
            $table->string('redirect_to')->nullable();
            $table->string('log_status');
            $table->string('log_icon');
            $table->json('log_style')->nullable();


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
        Schema::dropIfExists('activity_logs');
    }
};
