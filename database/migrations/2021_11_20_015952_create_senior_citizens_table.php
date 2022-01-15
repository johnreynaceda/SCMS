<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeniorCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senior_citizens', function (Blueprint $table) {
            $table->id();
            $table->string('osca_id')->nullable();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('extension')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('sex')->nullable();
            $table->string('age')->nullable();
            $table->string('contact')->nullable();
            $table->unsignedBigInteger('barangay_id')->nullable();
            $table->string('address')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('senior_citizens');
    }
}
