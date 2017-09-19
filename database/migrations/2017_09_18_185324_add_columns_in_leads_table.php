<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInLeadsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('leads', function (Blueprint $table) {
         $table->string('contact_person')->after('company_name');
         $table->string('email')->after('contact_person');
         $table->string('phone_number')->after('email');
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
         $table->dropColumn('contact_person');
         $table->dropColumn('email');
         $table->dropColumn('phone_number');
      });
   }
}
