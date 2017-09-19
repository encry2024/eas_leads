<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteContactPersonEmailsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::dropIfExists('contact_person_emails');
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      
   }
}
