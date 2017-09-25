<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneNumberColumnInLeadsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('leads', function (Blueprint $table) {
         $table->string('phone_number')->after('mobile_number');
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
         $table->dropColumn('phone_number');
      });
   }
}
