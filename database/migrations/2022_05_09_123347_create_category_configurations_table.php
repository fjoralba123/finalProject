<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_configurations', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('key');
            $table->foreign('key')->references('name')->on('category_configuration_keys');
            $table->string('type');
            $table->text('value');
            $table->text('default')->nullable();

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
        Schema::dropIfExists('category_configurations');
    }
}
