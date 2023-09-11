<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string('email_contact')->nullable();
            $table->string('phone')->nullable();
            $table->string('contact_name')->nullable();
            $table->integer('company_name')->nullable();
            $table->integer('job_level')->nullable();
            $table->string('industries')->nullable();
            $table->integer('country')->nullable();
            $table->integer('state')->nullable();
            $table->integer('city')->nullable();
            $table->string('county')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('area_code')->nullable();
            $table->string('website')->nullable();
            $table->float('price')->nullable();
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
        Schema::dropIfExists('emails');
    }
}
