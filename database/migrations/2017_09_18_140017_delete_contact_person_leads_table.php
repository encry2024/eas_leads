<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteContactPersonLeadsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::dropIfExists('contact_person_leads');
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
