<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueDataTypeInLeadsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('leads', function (Blueprint $table) {
         $table->string('phone_number')->unique()->change();
         $table->string('email')->unique()->change();
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
         $table->dropColumn('email');
      });
   }
}
