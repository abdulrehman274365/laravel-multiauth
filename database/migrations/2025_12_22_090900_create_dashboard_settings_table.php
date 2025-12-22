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
        Schema::create('dashboard_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->boolean('night_mode')->default(0);
            $table->boolean('left_side_bar_theme')->default(0);
            $table->boolean('left_side_bar_collpsed')->default(0);
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
        Schema::dropIfExists('dashboard_settings');
    }
};
