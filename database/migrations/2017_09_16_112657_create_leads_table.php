<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('leads', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('disposition_id');
         $table->string('name');
         $table->string('company_name');
         $table->string('nature_of_business');
         $table->string('additional_information');
         $table->string('appointment_schedule');
         $table->string('date_contacted');
         $table->string('overall_assessment');
         $table->string('reminder');
         $table->string('note');
         $table->timestamps();
         $table->softDeletes();
      });
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::dropIfExists('leads');
   }
}
