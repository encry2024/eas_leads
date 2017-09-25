<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyLeadsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('leads', function (Blueprint $table) {
         $table->renameColumn('phone_number', 'mobile_number');
      });
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::table('leads', function (Blueprint $table) {
         $table->dropColumn('mobile_number');
      });
   }
}
