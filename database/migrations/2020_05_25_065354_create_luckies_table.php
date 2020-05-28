<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuckiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luckies', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('number');
            $table->boolean('win');
            $table->float('sum_win', 8, 2)->default(0);
            $table->foreignId('link_id')->on('links')->onDelete('cascade');
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
        Schema::dropIfExists('luckies');
    }
}
