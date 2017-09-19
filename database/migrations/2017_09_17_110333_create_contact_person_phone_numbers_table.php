<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactPersonPhoneNumbersTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('contact_person_phone_numbers', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('contact_person_lead_id')->unsigned();
         $table->string('contact_number');
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
      Schema::dropIfExists('contact_person_phone_numbers');
   }
}
