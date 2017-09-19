<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableColumnInLeadsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('leads', function (Blueprint $table) {
         $table->date('appointment_schedule')->nullable()->change();
         $table->string('overall_assessment')->nullable()->change();
         $table->string('appointment_schedule')->nullable()->change();
         $table->string('reminder')->nullable()->change();
         $table->string('note')->nullable()->change();
         $table->string('additional_information')->nullable()->change();
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
         //
      });
   }
}
