<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('goal')->nullable();
            $table->string('pledge');
            $table->integer('amount')->nullable();
            $table->integer('amount_refund');
            $table->integer('percent');
            $table->integer('term')->nullable();
            $table->integer('term_magnitude');
            $table->string('description');
            $table->boolean('published');
            $table->integer('viewed')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('bids');
    }
}
