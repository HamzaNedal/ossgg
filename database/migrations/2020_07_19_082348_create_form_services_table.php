<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->integer('phone_country_code');
            $table->string('phone_no');
            $table->string('email');
            $table->string('name_of_project');
            $table->unsignedBigInteger('sector_of_project_id');
            $table->unsignedBigInteger('service_id');
            $table->text('short_description')->nullable();
            $table->string('file')->nullable();
            $table->enum('status',['0','1'])->default(0);
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sector_of_project_id')->references('id')->on('sector_of_project')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_services');
    }
}
