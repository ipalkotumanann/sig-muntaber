<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->integer('clinic_id')
                ->unsigned()
                ->nullable();
            $table->year('year');
            $table->integer('man_infected')
                ->unsigned()
                ->nullable();
            $table->integer('woman_infected')
                ->unsigned()
                ->nullable();
            $table->integer('man_died')
                ->unsigned()
                ->nullable();
            $table->integer('woman_died')
                ->unsigned()
                ->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('cases');
    }
}
